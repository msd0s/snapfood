<?php
namespace App\Models\Relations;

use App\Models\Comment;
use App\Models\Discount;
use App\Models\FoodCategory;
use App\Models\Foodparty;
use App\Models\Order;
use App\Models\OrderFoods;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

trait FoodRelationsTrait {
    use HasRelationships;
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function foodCategories()
    {
        return $this->belongsToMany(FoodCategory::class, 'food_foodcategories','food_id','foodcategory_id');
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'discount_foods','food_id','discount_id');
    }

    public function foodparties()
    {
        return $this->hasMany(Foodparty::class);
    }

    public function orderFoods()
    {
        return $this->hasMany(OrderFoods::class);
    }

    public function comments()
    {
        return $this->hasManyDeep(Comment::class,[OrderFoods::class,Order::class],['food_id','id','order_id']);
    }
}
