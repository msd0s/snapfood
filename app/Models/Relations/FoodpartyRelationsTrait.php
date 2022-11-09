<?php
namespace App\Models\Relations;

use App\Models\Discount;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait FoodpartyRelationsTrait {
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
