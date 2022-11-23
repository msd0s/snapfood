<?php

namespace App\Models;

use App\Models\Relations\OrderRelationsTrait;
use App\Models\Scopes\OrderScopesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use OrderRelationsTrait;
    use OrderScopesTrait;

    protected $fillable = [
        'user_id','address_id','restaurant_id','orderstatus_id','tracking_code','order_code','status'
    ];

    public const NOT_COMPLETE_ORDER = 0;
    public const COMPLETE_ORDER = 1;
    public const COMPLETE_ORDERSTATUS = 2;
}
