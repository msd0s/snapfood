<?php
namespace App\Models\Scopes;

use App\Models\Order;

trait CommentScopesTrait {
    public function scopeRequestDelete($query)
    {
        return $query->where('delete_request', self::DELETE_REQUEST);
    }
}
