<?php
namespace App\Models\Scopes;

trait RestaurantScopesTrait {
    public function scopeOpen($query,$status)
    {
        return $query->where('restaurant_status', $status);
    }

    public function scopeType($query,$type)
    {
        return $query->whereHas('restaurantCategories', function ($query) use ($type) {
            $query->where('title','LIKE', "%{$type}%");
        });
    }

    public function scopeScore($query,$score)
    {
        return $query->where('score','>', $score);
    }
}
