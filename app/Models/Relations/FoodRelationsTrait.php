<?php
namespace App\Models\Relations;

use App\Models\Discount;
use App\Models\FoodCategory;
use App\Models\Foodparty;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait FoodRelationsTrait {
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function foodCategories()
    {
        return $this->belongsToMany(FoodCategory::class, 'food_foodcategories','food_id','foodcategory_id');
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'discount_foods','food_id','discount_id');
    }

    public function foodparties()
    {
        return $this->hasMany(Foodparty::class);
    }
}
