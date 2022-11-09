<?php

namespace App\Models;

use App\Models\Relations\RestaurantRelationsTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    use RestaurantRelationsTrait;

    protected $fillable = [
        'user_id','name','phone','score','comment_count','account_number','picture','send_price','restaurant_status'
    ];

}
