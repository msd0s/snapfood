<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Discount::class);
        $discounts = $this->getAllDiscounts();
        return view('panel.discount.showDiscount',compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Discount::class);
        $discounts = $this->getAllDiscounts();
        return view('panel.discount.newDiscount',compact('discounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Discount::class);
        $request->validate([
            'title'=>'required',
            'coupon'=>'bail|required|unique:discounts',
            'price'=>'bail|required|numeric',
            'percent'=>'bail|required|numeric|min:0|max:100',
            'start_date'=>'bail|required|date',
            'expire_date'=>'bail|required|date',
        ]);

        Discount::create($request->except(['method','csrf']));
        return redirect()->back()->with(['successMassage'=>'New Discount Created Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discount = $this->findDiscountData($id);
        $this->authorize('view', $discount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discountItem = $this->findDiscountData($id);
        $this->authorize('update', $discountItem);
        $discounts = $this->getAllDiscounts();
        return view('panel.discount.newDiscount',compact(['discountItem','discounts']));
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
        $discount = $this->findDiscountData($id);
        $this->authorize('update', $discount);
        $request->validate([
            'title'=>'required',
            'coupon'=>'bail|required|unique:discounts',
            'price'=>'bail|required|numeric',
            'percent'=>'bail|required|numeric|min:0|max:100',
            'start_date'=>'bail|required|date',
            'expire_date'=>'bail|required|date',
        ]);

        $data = [
            'title'=>$request->title,
            'coupon'=>$request->coupon,
            'price'=>$request->price,
            'percent'=>$request->percent,
            'start_date'=>$request->start_date,
            'expire_date'=>$request->expire_date,
        ];
        Discount::where('id',$id)->update($data);
        return redirect()->back()->with(['successMassage'=>'Discount Code Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = $this->findDiscountData($id);
        $this->authorize('delete', $discount);
        $discount->delete();
        return redirect()->route('admin.discount.index')->with(['successMassage'=>'Discount Code Deleted Successfully.']);
    }

    private function getAllDiscounts()
    {
        return Discount::all();
    }

    private function findDiscountData($id)
    {
        return Discount::find($id);
    }
}
