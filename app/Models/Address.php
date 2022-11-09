<?php

namespace App\Models;

use App\Models\Relations\AddressRelationsTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AddressRelationsTrait;

    protected $fillable = [
        'title','restaurant_id','user_id','address','latitude','longitude','is_default'
    ];

}
