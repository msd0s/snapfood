<?php
namespace App\Models\Relations;

use App\Models\Food;
use App\Models\Foodparty;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait DiscountRelationsTrait {
    protected function percent(): Attribute
    {
        return Attribute::make(
            fn ($value) => $value.self::PERCENT_MARK,
        );
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'discount_foods','discount_id','food_id');
    }

    public function foodparties()
    {
        return $this->hasMany(Foodparty::class);
    }
}
