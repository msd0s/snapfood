<?php
namespace App\Models\Relations;

use App\Models\Food;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait FoodCategoryRelationsTrait {
    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_foodcategories','foodcategory_id','food_id');
    }
}
