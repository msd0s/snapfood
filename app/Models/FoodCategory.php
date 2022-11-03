<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $table='foodcategories';
    protected $fillable = [
        'title','english_title','main_id'
    ];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_foodcategories','foodcategory_id','food_id');
    }
}
