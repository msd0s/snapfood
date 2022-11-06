<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='foodcategories';
    protected $fillable = [
        'title','english_title','parent_id','status'
    ];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_foodcategories','foodcategory_id','food_id');
    }
}
