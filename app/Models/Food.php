<?php

namespace App\Models;

use App\Models\Relations\FoodRelationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory;
    use SoftDeletes;
    use FoodRelationsTrait;

    protected $fillable = [
        'restaurant_id','name','raw_materials','count','price','picture','status'
    ];

    public const NO_DISCOUNT=-1;
}
