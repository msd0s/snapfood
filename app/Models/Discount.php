<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title','coupon','price','percent','start_date','expire_date','status'
    ];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'discount_foods','discount_id','food_id');
    }

    public function foodparties()
    {
        return $this->hasMany(Foodparty::class);
    }
}
