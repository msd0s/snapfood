<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCategory extends Model
{
    use HasFactory;

    protected $table = 'restaurantcategories';
    protected $fillable = [
        'title','english_title','parent_id','status'
    ];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class, 'restaurant_restaurantcategories','restaurantcategory_id','restaurant_id');
    }
}
