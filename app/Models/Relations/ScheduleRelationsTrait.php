<?php
namespace App\Models\Relations;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait ScheduleRelationsTrait {
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    protected function day(): Attribute
    {
        return Attribute::make(
            fn ($value) => ["Saturday","Sunday","Monday","Tuesday", "Wednesday","Thursday","Friday"][$value],
        );
    }

    protected function isClosed(): Attribute
    {
        return Attribute::make(
            fn ($value) => ["باز","بسته"][$value],
        );
    }
}
