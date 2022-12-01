<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::middleware('auth:sanctum')->group(function (){
    Route::prefix('addresses')->group(function (){
        Route::get('', [AddressController::class,'getAddresses']);
        Route::post('', [AddressController::class,'storeAddress']);
        Route::post('/{address}', [AddressController::class,'setDefaultAddress']);
        Route::delete('/{address}', [AddressController::class,'deleteAddress']);
    });
    Route::prefix('profile')->group(function (){
        Route::get('', [ProfileController::class,'getProfile']);
        Route::patch('/{profile}', [ProfileController::class,'updateProfile']);
    });
    Route::prefix('restaurants')->group(function (){
        Route::get('', [RestaurantController::class,'getAllRestaurants']);
        Route::get('/nears', [RestaurantController::class,'allNearRestaurants']);
        Route::get('/{restaurant}', [RestaurantController::class,'getRestaurantData']);
        Route::get('/{restaurant}/foods', [RestaurantController::class,'getRestaurantFoods']);
        Route::post('', [RestaurantController::class,'storeAddress']);
        Route::post('/{restaurant}', [RestaurantController::class,'setDefaultAddress']);
        Route::delete('/{restaurant}', [RestaurantController::class,'deleteAddress']);
    });
    Route::prefix('carts')->group(function (){
        Route::get('', [CartController::class,'getAllCarts']);
        Route::post('/add', [CartController::class,'addToCart']);
        Route::patch('/add', [CartController::class,'updateCart']);
        Route::get('/{cart}', [CartController::class,'getCartInformations']);
        Route::post('/{cart}/pay', [CartController::class,'payCart'])->whereNumber('cart');
        Route::delete('/{order}/delete', [CartController::class,'deleteFromCart']);
    });
    Route::prefix('comments')->group(function (){
        Route::get('', [CommentController::class,'getAllComments']);
        Route::post('', [CommentController::class,'addComment']);
    });
});

