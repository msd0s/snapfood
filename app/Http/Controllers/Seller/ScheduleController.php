<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Seller\Functions\ScheduleFunctionsTrait;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    use ScheduleFunctionsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Schedule::class);
        $schedules = $this->getAllSchedules();
        return view('panel.Seller.schedule.showSchedule',compact(['schedules']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Schedule::class);
        return view('panel.Seller.schedule.newSchedule');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScheduleRequest $request)
    {
        $this->authorize('create', Schedule::class);
        $request->validated();

        $schedule = Schedule::updateOrCreate(
            ['restaurant_id' => auth()->user()->restaurant->id,'day'=>$request->day],
            ['from_hours'=>$request->from_hours, 'to_hours'=>$request->to_hours, 'is_closed'=>$request->is_closed]
        );
        return redirect()->back()->with(['successMassage'=>'New Schedule Created Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        $this->authorize('view', $schedule);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $this->authorize('update', $schedule);
        return view('panel.Seller.schedule.editSchedule',['scheduleItem'=>$schedule]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $this->authorize('update', $schedule);
        $request->validated();

        $schedule = Schedule::updateOrCreate(
            ['restaurant_id' => auth()->user()->restaurant->id,'day'=>$request->day],
            ['from_hours'=>$request->from_hours, 'to_hours'=>$request->to_hours, 'is_closed'=>$request->is_closed]
        );
        return redirect()->back()->with(['successMassage'=>'Schedule Data Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $this->authorize('delete', $schedule);
        $schedule->delete();
        return redirect()->route('seller.schedule.index')->with(['successMassage'=>'Schedule Deleted Successfully.']);
    }

}
