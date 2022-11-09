<?php
namespace App\Models\Relations;

use App\Models\Food;
use App\Models\Foodparty;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait AddressRelationsTrait {
    protected function isDefault(): Attribute
    {
        return Attribute::make(
            fn ($value) => ["خیر", "بله"][$value],
        );
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
