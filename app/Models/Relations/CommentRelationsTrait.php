<?php
namespace App\Models\Relations;

use App\Models\Food;
use App\Models\Foodparty;
use App\Models\Order;
use App\Models\OrderFoods;
use App\Models\User;

trait CommentRelationsTrait {

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

}
