<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Models\Discount;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Rules\PhoneRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Food::class);
        $foods = $this->getPaginatadFoods(5);
        return view('panel.Seller.food.showFood',compact(['foods']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Food::class);
        $cats = $this->getAllFoodCategories();
        $discounts = $this->getAllDiscounts();
        return view('panel.Seller.food.newFood',compact(['cats','discounts']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodRequest $request)
    {
        $this->authorize('create', Food::class);
        $request->validated();

        $pictureFileName = time().'-'.$request->file('picture')->getClientOriginalName();
        $uploadImage = Storage::disk('public')->putFileAs('foods/',$request->file('picture'),$pictureFileName);

        $data = [
            'restaurant_id'=>auth()->user()->restaurant->id,
            'name'=>$request->name,
            'raw_materials'=>$request->raw_materials,
            'picture'=>$pictureFileName,
            'price'=>$request->price,
            'count'=>$request->count,
            'stauts'=>$request->status,
        ];

        $food = Food::create($data);
        $food->foodCategories()->attach($request->foodcategory_id,['restaurant_id'=>auth()->user()->restaurant->id]);
        if ($request->discount_id!=Food::NO_DISCOUNT)
        {
            $food->discounts()->attach($request->discount_id);
        }
        return redirect()->back()->with(['successMassage'=>'New Food Created Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foodItem = $this->findFoodData($id);
        $this->authorize('view', $foodItem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodItem = $this->findFoodData($id);
        $this->authorize('update', $foodItem);
        $cats = $this->getAllFoodCategories();
        $discounts = $this->getAllDiscounts();
        return view('panel.Seller.food.editFood',compact(['foodItem','cats','discounts']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodRequest $request, $id)
    {
        $foodItem = $this->findFoodData($id);
        $this->authorize('update', $foodItem);
        $request->validated();


        $pictureFileName = time().'-'.$request->file('picture')->getClientOriginalName();
        $uploadImage = Storage::disk('public')->putFileAs('foods/',$request->file('picture'),$pictureFileName);

        $data = [
            'restaurant_id'=>auth()->user()->restaurant->id,
            'name'=>$request->name,
            'raw_materials'=>$request->raw_materials,
            'picture'=>$pictureFileName,
            'price'=>$request->price,
            'count'=>$request->count,
            'status'=>$request->status,
        ];
        Food::where('id',$id)->update($data);
        $food = $this->findFoodData($id);
        $food->foodCategories()->sync($request->foodcategory_id,['restaurant_id'=>auth()->user()->restaurant->id]);
        if ($request->discount_id!=Food::NO_DISCOUNT)
        {
            $food->discounts()->sync($request->discount_id);
        }else
        {
            $food->discounts()->detach();
        }
        return redirect()->back()->with(['successMassage'=>'Food Data Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foodItem = $this->findFoodData($id);
        $this->authorize('delete', $foodItem);
        $foodItem->delete();
        return redirect()->route('seller.food.index')->with(['successMassage'=>'Food Deleted Successfully.']);
    }

    private function getAllFoodCategories()
    {
        return FoodCategory::all();
    }

    private function getAllDiscounts()
    {
        return Discount::all();
    }

    private function getAllFoods()
    {
        return Food::all();
    }

    private function getPaginatadFoods($count)
    {
        return Food::paginate($count);
    }

    private function findFoodData($id)
    {
        return Food::find($id);
    }
}
