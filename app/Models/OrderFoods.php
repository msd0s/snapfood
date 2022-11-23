<?php

namespace App\Models;

use App\Models\Relations\OrderFoodRelationsTrait;
use App\Models\Scopes\OrderFoodScopesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFoods extends Model
{
    use HasFactory;
    use OrderFoodRelationsTrait;
    use OrderFoodScopesTrait;

    protected $table = 'orderfoods';
    protected $fillable = [
        'order_id','food_id','foodparty_id','count','price'
    ];
}
