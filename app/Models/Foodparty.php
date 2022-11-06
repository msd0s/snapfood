<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Foodparty extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'restaurant_id','food_id','discount_id','food_count','status'
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
