<?php

namespace App\Models;

use App\Models\Relations\RestaurantCategoryRelationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use RestaurantCategoryRelationsTrait;

    protected $table = 'restaurantcategories';
    protected $fillable = [
        'title','english_title','parent_id','status'
    ];

}
