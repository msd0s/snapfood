<?php

namespace App\Models;

use App\Models\Relations\FoodCategoryRelationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use FoodCategoryRelationsTrait;

    protected $table='foodcategories';
    protected $fillable = [
        'title','english_title','parent_id','status'
    ];
}
