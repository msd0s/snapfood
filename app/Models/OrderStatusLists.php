<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatusLists extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'orderstatuslists';
    protected $fillable = [
        'order_id','orderstatus_id','user_id'
    ];
}
