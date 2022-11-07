<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('access-profile');
        $addresses = $this->getAllAddresses();
        return view('panel.address.showAddress',compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('access-profile');
        return view('panel.address.newAddress');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressRequest $request)
    {
        $this->authorize('access-profile');
        $request->validated();
        $request->merge(['user_id'=>auth()->user()->id]);
        Address::create($request->except(['method','csrf']));
        return redirect()->back()->with(['successMassage'=>'New Address Created Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //$discount = $this->findDiscountData($id);
        $this->authorize('access-profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $addressItem = $address;
        $this->authorize('access-profile');
        return view('panel.address.editAddress',compact(['addressItem']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        //$discount = $this->findDiscountData($id);
        $this->authorize('access-profile');
        $request->validated();

        $data = [
            'title'=>$request->title,
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'is_default'=>$request->is_default,
        ];
        $address->update($data);
        return redirect()->back()->with(['successMassage'=>'Address Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $this->authorize('access-profile');
        $address->delete();
        return redirect()->route('address.index')->with(['successMassage'=>'Address Deleted Successfully.']);
    }

    private function getAllAddresses()
    {
        return Address::all()->where('user_id','!=','');
    }
}
