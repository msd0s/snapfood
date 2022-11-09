<?php
namespace App\Models\Relations;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait RestaurantCategoryRelationsTrait {
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class, 'restaurant_restaurantcategories','restaurantcategory_id','restaurant_id');
    }
}
