<?php

namespace App\Http\Controllers\Api;

use App\Events\OrderStatus;
use App\Http\Controllers\Api\Functions\OrderFunctionsTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreOrderRequest;
use App\Http\Requests\CompletePayRequest;
use App\Http\Resources\OrderResource;
use App\Jobs\ChangeOrderStatusEmailJob;
use App\Mail\ChangeOrderStatusMail;
use App\Models\Address;
use App\Models\Food;
use App\Models\Foodparty;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderFoods;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CartController extends Controller
{
    use OrderFunctionsTrait;
    public function getAllCarts()
    {
        $cards = auth()->user()->cards;
        return OrderResource::collection($cards);
    }

    public function addToCart(StoreOrderRequest $request)
    {
        try {
            $request->validated();
            $result = $this->findOrderFood($request->food_id, $request->count);

            // age order vojood nadasht avval order ro iejad mikonim
            if (!$result['orderExists']) {
                $result['order_id'] = Order::create(['user_id' => auth()->user()->id, 'restaurant_id' => $result['restaurant_id']])->id;
            }

            if ($result['foodPartyExists'] && !$result['foodPartyOrderExists'])
            {
                $foodPartyDiscount = $this->checkFoodPartyDiscount($result['foodPartyInstance']);
                $price = $result['foodInstance']->price - $foodPartyDiscount['percentDiscount'] - $foodPartyDiscount['priceDiscount'];
                if ($request->count > 1)
                {
                    $result['foodPartyOrderExists'] = OrderFoods::create(['order_id' => $result['order_id'], 'foodparty_id' => $result['foodparty_id'], 'food_id' => $result['foodInstance']->id, 'count' => 1, 'price' => $price]);
                    $request->count = $request->count - 1;
                }else
                {
                    $result['foodPartyOrderExists'] = OrderFoods::create(['order_id' => $result['order_id'], 'foodparty_id' => $result['foodparty_id'], 'food_id' => $result['foodInstance']->id, 'count' => $request->count, 'price' => $price]);
                    return $this->orderJsonResponse(true,'Food Added To Cart Successfully',200);
                }
            }
            //age food dar dakhel sefaresh vojood nadasht Food ro dar dakhel sefaresh iejad mikonim
            if (!$result['foodOrderExists']) {
                $foodDiscount = $this->checkFoodDiscount($result['foodInstance']);
                $price = $result['foodInstance']->price - $foodDiscount['percentDiscount'] - $foodDiscount['priceDiscount'];
                OrderFoods::create(['order_id' => $result['order_id'], 'food_id' => $result['foodInstance']->id, 'count' => $request->count, 'price' => $price]);
            } else {
                return $this->orderJsonResponse(false,'This Food Already Exists on Your Orders',200);
            }
            return $this->orderJsonResponse(true,'Food Added To Cart Successfully',200);
        } catch (\Throwable $th) {
            return $this->orderJsonResponse(false,$th->getMessage(),500);
        }
    }

    public function updateCart(StoreOrderRequest $request)
    {
        $request->validated();
        $result = $this->findOrderFood($request->food_id, $request->count);
        if ($result['foodOrderExists'])
        {
            if (!$this->checkFoodCount($result['foodOrderInstance']->food,$request->count))
            {
                return $this->orderJsonResponse(false,'Food Count Is Less Than Your Request Count.',200);
            }
            $count = $request->count;
            $result['foodOrderInstance']->update(['count'=>$count]);
            return $this->orderJsonResponse(true,'Food Count Updated Successfully',200);
        }
        return $this->orderJsonResponse(false,'Requested Update Food Not Found.',404);
    }

    public function getCartInformations(Order $cart)
    {
        if ($cart['user_id']==auth()->user()->id)
        {
            return OrderResource::make($cart);
        }
        return $this->orderJsonResponse(false,'You Dont Have Permission To Access This Cart.',403);
    }

    public function payCart(CompletePayRequest $request,Order $cart)
    {
        try {
            $request->validated();
            if ($cart['user_id'] == auth()->user()->id)
            {
                if ($cart['status']==0){
                    if(in_array($request->address_id,auth()->user()->addresses->pluck('id')->toArray()))
                    {
                        if ($this->checkFoodsCountBeforePay($cart->orderfoods)['status']==false){
                            $status = $this->checkFoodsCountBeforePay($cart->orderfoods)['status'];
                            $message = $this->checkFoodsCountBeforePay($cart->orderfoods)['message'];
                            return $this->orderJsonResponse($status,$message,200);
                        }
                        $cart->update(['address_id'=>$request->address_id,'orderstatus_id'=>Order::COMPLETE_ORDERSTATUS,'status'=>Order::COMPLETE_ORDER,'order_code'=>Str::random(12)]);
                        //$this->sendChangeOrderStatusEmail($cart);
                        $this->decreaseFoodsCount($cart->orderfoods);
                        return $this->orderJsonResponse(true,'Your Payment Completed Successfully.',200);
                    }
                    return $this->orderJsonResponse(false,'Your Address Id Is Incorrect.',403);
                }
                return $this->orderJsonResponse(false,'The Order Has Already Been Paid.',403);
            }
            return $this->orderJsonResponse(false,'You Dont Have Permission To Access This Cart.',403);
        } catch (\Throwable $th) {
            return $this->orderJsonResponse(false,$th->getMessage(),500);
        }
    }

    public function deleteFromCart(Order $order,Request $request)
    {
        if ($order['user_id']==auth()->user()->id && $order['status']==0 && in_array($request->foodorder_id,$order->orderfoods->pluck('id')->toArray()))
        {
            $order->orderfoods()->where('id',$request->foodorder_id)->delete();
            return $this->orderJsonResponse(true,'Food Removed From Cart Successfully',200);
        }
        return $this->orderJsonResponse(false,'You Dont Have Permission To Remove This Item',403);
    }

}
