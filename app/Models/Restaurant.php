<?php

namespace App\Models;

use App\Models\Relations\RestaurantRelationsTrait;
use App\Models\Scopes\RestaurantScopesTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasRelationships;
    use RestaurantRelationsTrait;
    use RestaurantScopesTrait;

    protected $fillable = [
        'user_id','name','phone','score','comment_count','account_number','picture','send_price','restaurant_status'
    ];

    public const ZERO_RESTAURANT = 0;

}
