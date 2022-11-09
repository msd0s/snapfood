<?php
namespace App\Http\Controllers\Seller\Functions;

use App\Models\Discount;
use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait FoodFunctionsTrait {
    private function getAllFoodCategories()
    {
        return FoodCategory::all();
    }

    private function getAllDiscounts()
    {
        return Discount::all();
    }

    private function getAllFoods()
    {
        return Food::all();
    }

    private function getPaginatadFoods($count)
    {
        return Food::paginate($count);
    }

    private function findFoodData($id)
    {
        return Food::find($id);
    }
}
