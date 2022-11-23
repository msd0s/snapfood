<?php
namespace App\Models\Scopes;

trait OrderFoodScopesTrait {

    public function scopeFood($query,$foodId)
    {
        return $query->where('food_id', $foodId);
    }

    public function scopeFoodParty($query,$foodPartyId)
    {
        return $query->where('foodparty_id', $foodPartyId);
    }

    public function scopeOrder($query,$orderId)
    {
        return $query->where('order_id', $orderId);
    }
}
