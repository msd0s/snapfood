<?php
namespace App\Http\Controllers\Admin\Functions;

use App\Models\FoodCategory;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait FoodCategoryFunctionsTrait{
    private function getAllFoodCategory()
    {
        return FoodCategory::all();
    }

    private function findCategoryData($id)
    {
        return FoodCategory::find($id);
    }
}
