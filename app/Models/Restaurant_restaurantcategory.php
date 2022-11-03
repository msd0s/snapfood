<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant_restaurantcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id','restaurantcategory_id'
    ];
}
