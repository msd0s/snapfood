<?php
namespace App\Http\Controllers\Api\Functions;

use App\Models\Discount;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait RestaurantFunctionsTrait {
    private function accessDenied()
    {
        return response()->json([
            'status'=> false,
            'message' => 'You Dont Have Access To This Address'
        ],403);
    }

    private function findNearestRestaurants($latitude, $longitude, $radius = 400)
    {
        /*
         * using eloquent approach, make sure to replace the "Restaurant" with your actual model name
         * replace 6371000 with 6371 for kilometer and 3956 for miles
         */
        $restaurants = Restaurant::selectRaw("restaurants.id AS restaurantid, addresses.id AS addressid, name, score, address, latitude, longitude ,
                         ( 6371 * acos( cos( radians(?) ) *
                           cos( radians( latitude ) )
                           * cos( radians( longitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( latitude ) ) )
                         ) AS distance", [$latitude, $longitude, $latitude])
            ->join('addresses','restaurants.id','=','addresses.restaurant_id')
            ->where('restaurant_id', '!=', '')
            ->having("distance", "<", $radius)
            ->orderBy("distance",'asc')
            ->offset(0)
            ->limit(20)
            ->get();

        return $restaurants;
    }
}
