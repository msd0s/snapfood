<?php
namespace App\Models\Relations;

use App\Models\OrderFoods;
use App\Models\OrderStatus;
use App\Models\Restaurant;
use App\Models\User;

trait OrderRelationsTrait {

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function orderFoods()
    {
        return $this->hasMany(OrderFoods::class);
    }

    public function orderStatus()
    {
        return $this->hasOne(OrderStatus::class);
    }

}
