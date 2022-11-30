<?php

namespace App\Models;

use App\Models\Relations\CommentRelationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CommentRelationsTrait;

    protected $fillable = [
        'user_id','order_id','score','comment','answer','delete_request','status'
    ];

    public const ENABLE_COMMENT = 1;
    public const DISABLE_COMMENT = 0;


}
