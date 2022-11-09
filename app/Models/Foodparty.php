<?php

namespace App\Models;

use App\Models\Relations\FoodpartyRelationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Foodparty extends Model
{
    use HasFactory;
    use SoftDeletes;
    use FoodpartyRelationsTrait;

    protected $fillable = [
        'restaurant_id','food_id','discount_id','food_count','status'
    ];

}
