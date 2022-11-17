<?php
namespace App\Http\Controllers\Api\Functions;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait AddressFunctionsTrait {
    private function accessDenied()
    {
        return response()->json([
            'status'=> false,
            'message' => 'You Dont Have Access To This Address'
        ],403);
    }
}
