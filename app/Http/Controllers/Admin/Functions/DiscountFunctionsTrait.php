<?php
namespace App\Http\Controllers\Admin\Functions;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait DiscountFunctionsTrait {
    private function getAllDiscounts()
    {
        return Discount::all();
    }

    private function findDiscountData($id)
    {
        return Discount::find($id);
    }
}
