<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Functions\OrderFunctionsTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Address;
use App\Models\Food;
use App\Models\Foodparty;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderFoods;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
            $count = $request->count + $result['foodOrderInstance']['count'];
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

}
