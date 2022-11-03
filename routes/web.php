<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodPartyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestaurantCategoryController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function (){
    Route::get('/',[HomeController::class,'index']);
    Route::prefix('admin')->group(function (){
        Route::get('/profile',[UserController::class,'profileForm'])->name('show.profile.form');
        Route::patch('/avatar/{id}/update',[UserController::class,'updateAvatar'])->whereNumber('id')->name('avatar.update');
        Route::patch('/profile/{id}/update',[UserController::class,'updateProfile'])->whereNumber('id')->name('profile.update');
        Route::as('admin.')->group(function (){
            Route::get('/home',[AdminController::class,'index'])->name('index');
            Route::resource('/foodcategory',FoodCategoryController::class);
            Route::resource('/restaurantcategory', RestaurantCategoryController::class);
            Route::resource('/discount', DiscountController::class);
        });
        Route::as('seller.')->group(function (){
            Route::middleware(['avoid.create.multiple.restaurant'])->group(function (){
                Route::get('/restaurant/set-restaurant-data',[RestaurantController::class,'createRestaurantDataForm'])->name('first.restaurant.data.form');
                Route::post('/restaurant/store-restaurant-data',[RestaurantController::class,'storeRestaurantData'])->name('first.restaurant.data.store');
            });
            Route::middleware('verify.basic.restaurant.data')->group(function (){
                Route::resource('/food', FoodController::class);
                Route::resource('/foodparty', FoodPartyController::class);
                Route::resource('/restaurant', RestaurantController::class);
                Route::resource('/schedule', ScheduleController::class);
            });
        });
        Route::as('user.')->group(function (){

        });
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
