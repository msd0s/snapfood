<?php
namespace App\Models\Relations;

use App\Models\Address;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Foodparty;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait RestaurantRelationsTrait {
    protected function restaurantStatus(): Attribute
    {
        return Attribute::make(
            fn ($value) => ["غیرفعال", "فعال"][$value],
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurantCategories()
    {
        return $this->belongsToMany(RestaurantCategory::class, 'restaurant_restaurantcategories','restaurant_id','restaurantcategory_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function foodCategories()
    {
        return $this->belongsToMany(FoodCategory::class,'food_foodcategories','restaurant_id','foodcategory_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function foodparties()
    {
        return $this->hasMany(Foodparty::class);
    }
}
