<?php
namespace App\Http\Controllers\Functions;

use App\Models\Address;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait AddressFunctionsTrait {
    private function getAllAddresses()
    {
        return Address::all()->where('user_id',auth()->user()->id);
    }
}
