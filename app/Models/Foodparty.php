<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodparty extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id','food_id','discount_id','food_count'
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
