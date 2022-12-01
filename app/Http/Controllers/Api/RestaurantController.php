<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Functions\RestaurantFunctionsTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Resources\AllRestaurantsResource;
use App\Http\Resources\NearRestaurantResource;
use App\Http\Resources\RestaurantCategoryResource;
use App\Http\Resources\RestaurantFoodsResource;
use App\Http\Resources\RestaurantResource;
use App\Models\Address;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    use RestaurantFunctionsTrait;
    public function getAllRestaurants(Request $request)
    {
        $restaurants = Restaurant::distinct();
        if (isset($request->type))
        {
            $restaurants = $restaurants->type($request->type);
        }
        if (isset($request->is_open) && is_numeric($request->is_open))
        {
            $restaurants = $restaurants->open($request->is_open);
        }
        if (isset($request->score_gt))
        {
            $restaurants = $restaurants->score($request->score_gt);
        }

        $restaurants = $restaurants->get();

        return AllRestaurantsResource::collection($restaurants);
    }

    public function getRestaurantData(Restaurant $restaurant)
    {
        return RestaurantResource::make($restaurant);
    }

    public function getRestaurantFoods(Restaurant $restaurant)
    {
        return RestaurantFoodsResource::make($restaurant);
    }

    public function storeAddress(StoreAddressRequest $request)
    {
        try {
            $request->validated();
            $request->merge(['user_id'=>auth()->user()->id]);
            Address::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Address Added Successfully',
            ], 200);
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function setDefaultAddress(Address $address)
    {
        try {
            if ($address->user_id==auth()->user()->id)
            {
                auth()->user()->addresses()->update(['is_default'=>0]);
                $address->update(['is_default'=>1]);
                return response()->json([
                    'status'=> true,
                    'message' => 'Current Address Updated Successfully'
                ],200);
            }else
            {
                return $this->accessDenied();
            }
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function deleteAddress(Address $address)
    {
        try {
            if ($address->user_id==auth()->user()->id)
            {
                $address->delete();
                return response()->json([
                    'status'=> true,
                    'message' => 'Address Deleted Successfully'
                ],200);
            }else
            {
                return $this->accessDenied();
            }
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function allNearRestaurants()
    {
        $userAddress = auth()->user()->addresses()?->where('is_default',1)->first();
        if (!$userAddress)
        {
            return response()->json([
                'status' => false,
                'message' => 'Address Not Found Or Address is Not Set To Default.'
            ], 404);
        }
        $nearRestaurants = $this->findNearestRestaurants($userAddress['latitude'],$userAddress['longitude']);
        return NearRestaurantResource::collection($nearRestaurants);
    }
}
