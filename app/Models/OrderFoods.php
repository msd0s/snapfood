<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFoods extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id','food_id','foodparty_id','count','price'
    ];
}
