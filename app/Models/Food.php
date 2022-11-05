<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id','name','raw_materials','count','price','picture'
    ];

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

    public const NO_DISCOUNT=-1;
}
