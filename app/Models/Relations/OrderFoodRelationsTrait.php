<?php
namespace App\Models\Relations;

use App\Models\Food;
use App\Models\Order;
use App\Models\OrderFoods;
use App\Models\Restaurant;
use App\Models\User;

trait OrderFoodRelationsTrait {

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
