<?php
namespace App\Models\Relations;

use App\Models\Address;
use App\Models\Food;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait UserRelationsTrait {
    protected function role(): Attribute
    {
        return Attribute::make(
            fn ($value) => ["Administrator", "Seller",'User'][$value],
        );
    }

    //add Relation For Restaurant and User
    public function restaurant()
    {
        return $this->hasOne(Restaurant::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function foods()
    {
        return $this->hasManyThrough(Food::class,Restaurant::class);
    }

    public function cards()
    {
        return $this->hasMany(Order::class);
    }
}
