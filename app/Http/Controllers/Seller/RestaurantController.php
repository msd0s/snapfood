<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Seller\Functions\RestaurantFunctionsTrait;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Address;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Rules\PhoneRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    use RestaurantFunctionsTrait;
    public function createRestaurantDataForm()
    {
        $this->authorize('create', Restaurant::class);
        $cats = $this->getAllRestaurantCategories();
        return view('panel.Seller.restaurant.firstDataForRestaurant',compact(['cats']));
    }

    public function storeRestaurantData(StoreRestaurantRequest $request)
    {
        $this->authorize('create', Restaurant::class);
        $request->validated();
        $request->merge(['user_id'=>auth()->user()->id]);

        $restaurant = Restaurant::create($request->except(['method','csrf','restaurantcategory_id']));
        $restaurant->restaurantCategories()->attach($request->restaurantcategory_id);
        $address = Address::updateOrCreate(
            ['restaurant_id' => $restaurant->id],
            ['title'=>$request->title,'address' => $request->address, 'latitude' => $request->latitude, 'longitude' => $request->longitude,'is_default'=>$request->is_default]
        );
        return redirect()->back()->with(['successMassage'=>'New Restaurant Created Successfully.']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Restaurant::class);
        $restaurant = $this->getRestaurant();
        return view('panel.Seller.restaurant.showRestaurant',compact(['restaurant']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Restaurant::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Restaurant::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurantItem = $this->findRestaurantData($id);
        $this->authorize('view', $restaurantItem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurantItem = $this->findRestaurantData($id);
        $this->authorize('update', $restaurantItem);
        $cats = $this->getAllRestaurantCategories();
        return view('panel.Seller.restaurant.newRestaurant',compact(['restaurantItem','cats']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, $id)
    {
        $restaurantItem = $this->findRestaurantData($id);
        $this->authorize('update', $restaurantItem);
        $request->validated();


        $pictureFileName = time().'-'.$request->file('picture')->getClientOriginalName();
        $uploadImage = Storage::disk('public')->putFileAs('restaurants/',$request->file('picture'),$pictureFileName);

        $data = [
            'name'=>$request->name,
            'phone'=>$request->phone,
            'account_number'=>$request->account_number,
            'picture'=>$pictureFileName,
            'send_price'=>$request->send_price,
            'restaurant_status'=>$request->restaurant_status,
        ];
        $restaurantId = Restaurant::where('id',$id)->update($data);
        $restaurant = Restaurant::find($restaurantId);
        $restaurant->restaurantCategories()->sync($request->restaurantcategory_id);

        $address = Address::updateOrCreate(
            ['restaurant_id' => $restaurant->id],
            ['address' => $request->address, 'latitude' => $request->latitude, 'longitude' => $request->longitude]
        );
        return redirect()->back()->with(['successMassage'=>'Restaurant Data Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = $this->findRestaurantData($id);
        $this->authorize('delete', $restaurant);
        $restaurant->delete();
        return redirect()->route('seller.restaurant.index')->with(['successMassage'=>'Restaurant Deleted Successfully.']);
    }

}
