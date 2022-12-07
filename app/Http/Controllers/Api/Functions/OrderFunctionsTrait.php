<?php
namespace App\Http\Controllers\Api\Functions;

use App\Events\OrderStatus;
use App\Models\Discount;
use App\Models\Food;
use App\Models\Foodparty;
use App\Models\Order;
use App\Models\OrderFoods;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

trait OrderFunctionsTrait {
    private function accessDenied()
    {
        return response()->json([
            'status'=> false,
            'message' => 'You Dont Have Access To This Address'
        ],403);
    }

    public function findOrderFood($food_id,$count)
    {
        $data = [
            'orderExists' => false,
            'order_id' => false,
            'foodInstance' => false,
            'foodOrderExists' => false,
            'foodOrderInstance' => false,
            'foodPartyExists' => false,
            'foodparty_id' => false,
            'foodPartyInstance' => false,
            'foodPartyOrderExists' => false,
            'foodPartyOrderInstance' => false,
            'restaurant_id' => false,
        ];
        // check food with this food_id exists and get restaurant_id
        $food = $this->checkFoodExists($food_id);

        if ($food['foodExists'])
        {
            $data['restaurant_id'] = $food['restaurant_id'];
            $data['foodInstance'] = $food['foodInstance'];

            // check that order for this user with this restaurant_id and zero status exist or not.
            $findOrder = $this->checkOrderExists($food['restaurant_id']);

            if ($findOrder['orderExists'])
            {

                $data['orderExists'] = $findOrder['orderExists'];
                $data['order_id'] = $findOrder['order_id'];

                $isFoodOrderExists = $this->checkFoodOrderExists($food_id,$findOrder['order_id']);
                if ($isFoodOrderExists['foodOrderExists'])
                {
                    $data['foodOrderExists'] = $isFoodOrderExists['foodOrderExists'];
                    $data['foodOrderInstance'] = $isFoodOrderExists['foodOrderInstance'];
                }
            }
            //barresi mikonim ke food dakhel foodparty hast ya na
            $foodParty = $this->findFoodParty($food_id,$food['restaurant_id']);

            if ($foodParty['foodPartyExists'])
            {
                $data['foodPartyExists'] = $foodParty['foodPartyExists'];
                $data['foodparty_id'] = $foodParty['foodParty_id'];
                $data['foodPartyInstance'] = $foodParty['foodPartyInstance'];

                if ($findOrder['orderExists']) {
                    $isFoodPartyOrderExists = $this->checkFoodPartyOrderExists($food_id,$foodParty['foodParty_id'],$findOrder['order_id']);

                    if ($isFoodPartyOrderExists['foodPartyOrderExists'])
                    {
                        $data['foodPartyOrderExists'] = $isFoodPartyOrderExists['foodPartyOrderExists'];
                        $data['foodPartyOrderInstance'] = $isFoodPartyOrderExists['foodPartyOrderInstance'];
                    }
                }
            }
            return $data;
        }
        return $this->orderJsonResponse(false,'Requested Food Not Found.',404);
    }

    public function checkFoodExists($food_id)
    {
        $food = Food::find($food_id);
        if (isset($food))
        {
            return [
                'foodExists'=>true,
                'restaurant_id'=>$food->restaurant_id,
                'foodInstance'=>$food,
            ];
        }
        return [
            'foodExists'=>false,
            'restaurant_id'=>false,
            'foodInstance'=>false,
        ];
    }

    public function checkOrderExists($restaurant_id)
    {
        $order = Order::distinct()->checkuser(auth()->user()->id)->restaurant($restaurant_id)->notcompleteorder()->first();
        if (isset($order))
        {
            return [
                'orderExists'=>true,
                'order_id'=>$order->id,
                'orderInstance'=>$order,
            ];
        }
        return [
            'orderExists'=>false,
            'order_id'=>false,
            'orderInstance'=>false,
        ];
    }

    public function checkFoodPartyOrderExists($food_id,$foodparty_id,$order_id)
    {
        $foodPartyOrder = OrderFoods::distinct()->food($food_id)->foodparty($foodparty_id)->order($order_id)->first();
        if (isset($foodPartyOrder))
        {
            return [
                'foodPartyOrderExists'=> true,
                'foodPartyOrderInstance'=>$foodPartyOrder,
            ];
        }
        return [
            'foodPartyOrderExists'=> false,
            'foodPartyOrderInstance'=> false,
        ];
    }

    public function checkFoodOrderExists($food_id,$order_id)
    {
        $foodOrder = OrderFoods::distinct()->food($food_id)->foodparty(Order::NO_FOODPARTY)->order($order_id)->first();
        if (isset($foodOrder))
        {
            return [
                'foodOrderExists'=> true,
                'foodOrderInstance'=>$foodOrder,
            ];
        }
        return [
            'foodOrderExists'=> false,
            'foodOrderInstance'=> false,
        ];
    }

    public function checkFoodDiscount($food)
    {
        $data = [
            'percentDiscount' => Discount::NO_PERCENT_DISCOUNT,
            'priceDiscount' => Discount::NO_PRICE_DISCOUNT,
            'foodparty_id' => false,
            'food_id' => false,
        ];
        $discount = $food->discounts()->first();
        $data['food_id'] = $food['id'];
        if (isset($discount) && explode('%', $discount['percent'])[0] > Discount::NO_PERCENT_DISCOUNT) {
            $percentDiscount = ($food['price'] * explode('%', $discount['percent'])[0]) / Discount::HOUNDRED_PERCENT;
            $data['percentDiscount'] = $percentDiscount;
        }
        if (isset($discount) && $discount['price'] > Discount::NO_PRICE_DISCOUNT) {
            $priceDiscount = $discount['price'];
            $data['priceDiscount'] = $priceDiscount;
        }
        return $data;
    }

    public function checkFoodPartyDiscount($foodParty)
    {
        $data = [
            'percentDiscount' => Discount::NO_PERCENT_DISCOUNT,
            'priceDiscount' => Discount::NO_PRICE_DISCOUNT,
            'foodparty_id' => false,
            'food_id' => false,
        ];
        $discount = $foodParty->discount;
        $data['foodparty_id'] = $foodParty['id'];
        $data['food_id'] = $foodParty['food_id'];
        if (isset($discount) && explode('%', $discount['percent'])[0] > Discount::NO_PERCENT_DISCOUNT) {
            $percentDiscount = ($foodParty->food['price'] * explode('%', $discount['percent'])[0]) / Discount::HOUNDRED_PERCENT;
            $data['percentDiscount'] = $percentDiscount;
        }
        if (isset($discount) && $discount['price'] > Discount::NO_PRICE_DISCOUNT) {
            $priceDiscount = $discount['price'];
            $data['priceDiscount'] = $priceDiscount;
        }
        return $data;
    }

    public function findFoodParty($food_id, $restaurant_id)
    {
        $startTime = Carbon::createFromFormat('H:i a', Foodparty::FOODPARTY_START_TIME);
        $endTime = Carbon::createFromFormat('H:i a', Foodparty::FOODPARTY_END_TIME);
        if (Carbon::now()->between($startTime, $endTime, true)) {
            $food = Foodparty::distinct()->where('food_id', $food_id)->where('restaurant_id', $restaurant_id)->where('food_count', '>', Foodparty::FOODPARTY_ZERO_COUNT)->first();
            if (isset($food)) {
                return $data = [
                    'foodPartyExists' => true,
                    'foodParty_id' => $food['id'],
                    'foodPartyInstance' => $food,
                ];
            }
            return $data = [
                'foodPartyExists' => false,
                'foodParty_id' => false,
                'foodPartyInstance' => false,
            ];
        }
        return $data = [
            'foodPartyExists' => false,
            'foodParty_id' => false,
            'foodPartyInstance' => false,
        ];
    }

    public function orderJsonResponse($status,$message,$statusCode)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
        ], $statusCode);
    }

    public function sendChangeOrderStatusEmail($cart)
    {
        event(new OrderStatus($cart));
    }

    public function checkFoodsCountBeforePay($orderFoods)
    {
        foreach ($orderFoods as $orderFood)
        {
            if ($orderFood['foodparty_id']>Foodparty::WRONG_FOODPARTY)
            {
                if ($orderFood->foodparty['food_count']<$orderFood['count'])
                {
                    $foodName = $orderFood->food['name'];
                    $maxCount = $orderFood->food['count'];
                    $foodId = $orderFood['food_id'];
                    return [
                        'status'=>false,
                        'message'=>"Max Count For Food $foodName In FoodParty With Id $foodId Is $maxCount",
                    ];
                }
            }else
            {
                if ($orderFood->food['count']<$orderFood['count'])
                {
                    $foodName = $orderFood->food['name'];
                    $maxCount = $orderFood->food['count'];
                    $foodId = $orderFood['food_id'];
                    return [
                        'status'=>false,
                        'message'=>"Max Count For Food $foodName With Id $foodId Is $maxCount",
                    ];
                }
            }
        }
        return [
            'status'=>true,
            'message'=>"",
        ];
    }

    public function checkFoodCount($food,$count)
    {
        if ($food['count']>=$count)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function decreaseFoodsCount($orderFoods)
    {
        foreach ($orderFoods as $orderFood)
        {
            if ($orderFood['foodparty_id']>Foodparty::WRONG_FOODPARTY)
            {
                $foodpartyCount = $orderFood->foodparty['food_count']-$orderFood['count'];
                $orderFood->foodparty->update(['food_count'=>$foodpartyCount]);
            }
            $foodCount = $orderFood->food['count']-$orderFood['count'];
            $orderFood->food->update(['count'=>$foodCount]);
        }
    }

    public function checkOrderCompleted($orderId)
    {
        $order = Order::find($orderId);
        if ($order['status']==Order::ENABLE_STATUS)
        {
            return true;
        }
        return false;
    }

}
