<?php

namespace App\Models;

use App\Models\Relations\ScheduleRelationsTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ScheduleRelationsTrait;

    protected $fillable = [
        'restaurant_id','day','from_hours','to_hours','is_closed'
    ];



}
