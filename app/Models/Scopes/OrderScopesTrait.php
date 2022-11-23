<?php
namespace App\Models\Scopes;

use App\Models\Order;

trait OrderScopesTrait {
    public function scopeCheckUser($query,$userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeRestaurant($query,$restaurantId)
    {
        return $query->where('restaurant_id',$restaurantId);
    }

    public function scopeNotCompleteOrder($query)
    {
        return $query->where('status',Order::NOT_COMPLETE_ORDER);
    }

    public function scopeFood($query,$foodId)
    {
        return $query->where('food_id', $foodId);
    }

    public function scopeOrder($query,$orderId)
    {
        return $query->where('order_id', $orderId);
    }
}
