<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_foodcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id','foodcategory_id'
    ];
}
