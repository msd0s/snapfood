<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Schedule::class);
        $schedules = $this->getAllSchedules();
        return view('panel.schedule.showSchedule',compact(['schedules']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Schedule::class);
        return view('panel.schedule.newSchedule');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Schedule::class);
        $request->validate([
            'day'=>'required',
            'from_hours'=>'required',
            'to_hours'=>'required',
            'is_closed'=>'required',
        ]);

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
    public function show($id)
    {
        $scheduleItem = $this->findScheduleItem($id);
        $this->authorize('view', $scheduleItem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scheduleItem = $this->findScheduleItem($id);
        $this->authorize('update', $scheduleItem);
        return view('panel.schedule.newSchedule',compact(['scheduleItem']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $scheduleItem = $this->findScheduleItem($id);
        $this->authorize('update', $scheduleItem);
        $request->validate([
            'day'=>'required',
            'from_hours'=>'required',
            'to_hours'=>'required',
            'is_closed'=>'required',
        ]);

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
    public function destroy($id)
    {
        $scheduleItem = $this->findScheduleItem($id);
        $this->authorize('delete', $scheduleItem);
        $scheduleItem->delete();
        return redirect()->route('seller.schedule.index')->with(['successMassage'=>'Schedule Deleted Successfully.']);
    }


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
