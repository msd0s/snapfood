<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'restaurant_id','day','from_hours','to_hours','is_closed'
    ];

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
