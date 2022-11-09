<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Seller\Functions\FoodPartyFunctionsTrait;
use App\Http\Requests\StoreFoodPartyRequest;
use App\Http\Requests\UpdateFoodPartyRequest;
use App\Models\Discount;
use App\Models\Food;
use App\Models\Foodparty;
use App\Models\Restaurant;
use App\Rules\DiscountIdRule;
use Illuminate\Http\Request;

class FoodPartyController extends Controller
{
    use FoodPartyFunctionsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Foodparty::class);
        $foodparties = $this->getAllFoodParties(5);
        return view('panel.Seller.foodparty.showFoodparty',compact(['foodparties']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Foodparty::class);
        $discounts = Discount::all();
        $restaurants = auth()->user()->restaurant;
        return view('panel.Seller.foodparty.newFoodparty',compact(['discounts','restaurants']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodPartyRequest $request)
    {
        $this->authorize('create', Foodparty::class);
        $request->validated();

        $foodParty = Foodparty::updateOrCreate(
            ['restaurant_id' => auth()->user()->restaurant->id,'food_id'=>$request->food_id],
            ['discount_id'=>$request->discount_id, 'food_count'=>$request->food_count, 'status'=>$request->status]
        );
        return redirect()->back()->with(['successMassage'=>'New FoodParty Created Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foodPartyItem = $this->findFoodPartyItem($id);
        $this->authorize('view', $foodPartyItem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodPartyItem = $this->findFoodPartyItem($id);
        $this->authorize('update', $foodPartyItem);
        $discounts = Discount::all();
        $restaurants = auth()->user()->restaurant;
        return view('panel.Seller.foodparty.editFoodparty',compact(['foodPartyItem','discounts','restaurants']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodPartyRequest $request, $id)
    {
        $foodPartyItem = $this->findFoodPartyItem($id);
        $this->authorize('update', $foodPartyItem);
        $request->validated();

        $foodParty = Foodparty::updateOrCreate(
            ['restaurant_id' => auth()->user()->restaurant->id,'food_id'=>$request->food_id],
            ['discount_id'=>$request->discount_id, 'food_count'=>$request->food_count, 'stauts'=>$request->status]
        );
        return redirect()->back()->with(['successMassage'=>'FoodParty Data Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foodPartyItem = $this->findFoodPartyItem($id);
        $this->authorize('delete', $foodPartyItem);
        $foodPartyItem->delete();
        return redirect()->route('seller.foodparty.index')->with(['successMassage'=>'FoodParty Deleted Successfully.']);
    }

}
