<?php
namespace App\Http\Controllers\Admin\Functions;

use App\Models\RestaurantCategory;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait RestaurantCategoryFunctionsTrait{
    private function getAllRestaurantCategory()
    {
        return RestaurantCategory::all();
    }

    private function findCategoryData($id)
    {
        return RestaurantCategory::find($id);
    }
}
