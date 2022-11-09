<?php
namespace App\Http\Controllers\Seller\Functions;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait ScheduleFunctionsTrait {
    private function getAllSchedules()
    {
        $restaurant_id = auth()->user()->restaurant->id;
        return Schedule::all()->where('restaurant_id',$restaurant_id);
    }

    private function findScheduleItem($id)
    {
        return Schedule::find($id);
    }
}
