<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount_food extends Model
{
    use HasFactory;

    protected $fillable = [
        'discount_id','food_id'
    ];
}
