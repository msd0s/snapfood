<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

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
            fn ($value) => ["Opened","Closed"][$value],
        );
    }

}
