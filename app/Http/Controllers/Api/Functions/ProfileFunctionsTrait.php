<?php
namespace App\Http\Controllers\Api\Functions;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait ProfileFunctionsTrait {
    private function accessDenied()
    {
        return response()->json([
            'status'=> false,
            'message' => 'You Dont Have Access To This Address'
        ],403);
    }

    private function bcryptPassword($password)
    {
        return bcrypt($password);
    }
}
