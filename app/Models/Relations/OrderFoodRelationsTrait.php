<?php
namespace App\Models\Relations;

use App\Models\Food;
use App\Models\Foodparty;
use App\Models\Order;
use App\Models\OrderFoods;
use App\Models\Restaurant;
use App\Models\User;

trait OrderFoodRelationsTrait {

    public function food()
    {
        return $this->belongsTo(Food::class,'food_id');
    }

    public function foodparty()
    {
        return $this->belongsTo(Foodparty::class,'foodparty_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
