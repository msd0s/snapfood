<?php

namespace App\Models;

use App\Models\Relations\DiscountRelationsTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory;
    use SoftDeletes;
    use DiscountRelationsTrait;

    protected $fillable = [
        'title','coupon','price','percent','start_date','expire_date','status'
    ];

    public const PERCENT_MARK='%';
}
