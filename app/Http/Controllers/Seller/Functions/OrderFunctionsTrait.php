<?php
namespace App\Http\Controllers\Seller\Functions;

use App\Events\OrderStatus;
use App\Models\Discount;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Order;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait OrderFunctionsTrait {
    private function getReceivedOrders()
    {
        return Order::distinct()->where('restaurant_id',auth()->user()->restaurant?->id)->where('orderstatus_id',5);
    }

    private function allOrderPrices($orders)
    {
        $allPrice = 0;
        if ($orders->count()>0)
        {
            foreach ($orders as $order)
            {
                foreach ($order->orderfoods as $orderfood)
                {
                    $allPrice = $allPrice + ($orderfood['price'] * $orderfood['count']);
                }
            }
        }
        return $allPrice;
    }

    public function sendChangeOrderStatusEmail($cart)
    {
        event(new OrderStatus($cart));
    }


}
