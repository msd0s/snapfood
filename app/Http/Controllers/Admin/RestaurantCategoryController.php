<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Functions\RestaurantCategoryFunctionsTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantCategoryRequest;
use App\Http\Requests\UpdateRestaurantCategoryRequest;
use App\Models\FoodCategory;
use App\Models\RestaurantCategory;
use App\Rules\CategoryIdRule;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
    use RestaurantCategoryFunctionsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', RestaurantCategory::class);
        $cats = $this->getAllRestaurantCategory();
        return view('panel.Admin.restaurantcategory.showRestaurantCategory',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', RestaurantCategory::class);
        $cats = $this->getAllRestaurantCategory();
        return view('panel.Admin.restaurantcategory.newRestaurantCategory',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantCategoryRequest $request)
    {
        $this->authorize('create', RestaurantCategory::class);
        $request->validated();

        RestaurantCategory::create($request->except(['method','csrf']));
        return redirect()->back()->with(['successMassage'=>'Restaurant Category Created Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantCategory $restaurantcategory)
    {
        $this->authorize('view', $restaurantcategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RestaurantCategory $restaurantcategory)
    {
        $this->authorize('update', $restaurantcategory);
        $cats = $this->getAllRestaurantCategory();
        return view('panel.Admin.restaurantcategory.editRestaurantCategory',['catItem'=>$restaurantcategory,'cats'=>$cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantCategoryRequest $request, RestaurantCategory $restaurantcategory)
    {
        $this->authorize('update', $restaurantcategory);
        $request->validated();

        $data = [
            'title'=>$request->title,
            'english_title'=>$request->english_title,
            'parent_id'=>$request->main_id,
            'status'=>$request->status,
        ];
        $restaurantcategory->update($data);
        return redirect()->back()->with(['successMassage'=>'Restaurant Category Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestaurantCategory $restaurantcategory)
    {
        $this->authorize('delete', $restaurantcategory);
        $restaurantcategory->delete();
        return redirect()->route('admin.restaurantcategory.index')->with(['successMassage'=>'Restaurant Category Deleted Successfully.']);
    }

}
