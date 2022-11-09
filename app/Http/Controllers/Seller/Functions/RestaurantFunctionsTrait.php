<?php
namespace App\Http\Controllers\Seller\Functions;

use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait RestaurantFunctionsTrait {
    public function getAllRestaurantCategories()
    {
        return RestaurantCategory::all();
    }

    public function getRestaurant()
    {
        return auth()->user()->restaurant;
    }

    public function findRestaurantData($id)
    {
        return Restaurant::find($id);
    }
}
