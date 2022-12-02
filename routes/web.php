<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\FoodCategoryController;
use App\Http\Controllers\Admin\RestaurantCategoryController;
use App\Http\Controllers\Seller\CommentController;
use App\Http\Controllers\Seller\FoodController;
use App\Http\Controllers\Seller\FoodPartyController;
use App\Http\Controllers\Seller\OrderController;
use App\Http\Controllers\Seller\RestaurantController;
use App\Http\Controllers\Seller\ScheduleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\UserController;
use App\Models\Comment;
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
        Route::resource('/address', AddressController::class);
        Route::as('admin.')->group(function (){
            Route::get('/home',[AdminController::class,'index'])->name('index');
            Route::resource('/foodcategory',FoodCategoryController::class);
            Route::resource('/restaurantcategory', RestaurantCategoryController::class);
            Route::resource('/discount', DiscountController::class);
            Route::resource('/comments', AdminCommentController::class);
            Route::resource('/banner', BannerController::class);
        });
        Route::as('seller.')->group(function (){
            Route::get('/index', [SellerController::class,'index'])->name('index');
            Route::middleware(['avoid.create.multiple.restaurant'])->group(function (){
                Route::get('/restaurant/set-restaurant-data',[RestaurantController::class,'createRestaurantDataForm'])->name('first.restaurant.data.form');
                Route::post('/restaurant/store-restaurant-data',[RestaurantController::class,'storeRestaurantData'])->name('first.restaurant.data.store');
            });
            Route::middleware('verify.basic.restaurant.data')->group(function (){
                Route::resource('/food', FoodController::class);
                Route::resource('/foodparty', FoodPartyController::class);
                Route::resource('/restaurant', RestaurantController::class);
                Route::resource('/schedule', ScheduleController::class);
                Route::resource('/comment', CommentController::class);
                Route::patch('/comment/{comment}/status', [CommentController::class,'changeCommentStatus'])->name('comment.changestatus');
                Route::prefix('orders')->group(function (){
                    Route::patch('/{order}',[OrderController::class,'updateStatus'])->whereNumber('order')->name('orderstatus.update');
                    Route::get('/{order}/foods',[OrderController::class,'showOrderFoods'])->whereNumber('order')->name('orderfoods.show');
                    Route::get('/archivedorders',[OrderController::class,'showArchivedOrders'])->whereNumber('order')->name('archivedorder.show');
                });
            });
        });
        Route::as('user.')->group(function (){
            Route::get('/dashboard', [UserController::class,'dashboard'])->name('index');
            Route::get('/foods/{order}',[UserController::class,'showOrderFoods'])->whereNumber('order')->name('orderfoods.show');
        });
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
