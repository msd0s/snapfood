<?php
namespace App\Http\Controllers\Seller\Functions;

use App\Models\Foodparty;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait FoodPartyFunctionsTrait {
    private function getAllFoodParties($count)
    {
        $restaurant_id = auth()->user()->restaurant->id;
        return Foodparty::where('restaurant_id',$restaurant_id)->paginate($count);
    }

    private function findFoodPartyItem($id)
    {
        return Foodparty::find($id);
    }
}
