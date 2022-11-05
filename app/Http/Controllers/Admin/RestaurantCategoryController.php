<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', RestaurantCategory::class);
        $cats = $this->getAllRestaurantCategory();
        return view('panel.restaurantcategory.showRestaurantCategory',compact('cats'));
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
        return view('panel.restaurantcategory.newRestaurantCategory',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', RestaurantCategory::class);
        $request->validate([
            'title'=>'required',
            'english_title'=>'required',
            'parent_id'=>'required|numeric',
        ]);

        RestaurantCategory::create($request->except(['method','csrf']));
        return redirect()->back()->with(['successMassage'=>'Restaurant Category Created Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurantCategory = $this->findCategoryData($id);
        $this->authorize('view', $restaurantCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catItem = $this->findCategoryData($id);
        $this->authorize('update', $catItem);
        $cats = $this->getAllRestaurantCategory();
        return view('panel.restaurantcategory.newRestaurantCategory',compact(['catItem','cats']));
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
        $catItem = $this->findCategoryData($id);
        $this->authorize('update', $catItem);
        $request->validate([
            'title'=>'required',
            'english_title'=>'required',
            'parent_id'=>'required|numeric',
        ]);

        $data = [
            'title'=>$request->title,
            'english_title'=>$request->english_title,
            'parent_id'=>$request->main_id,
        ];
        RestaurantCategory::where('id',$id)->update($data);
        return redirect()->back()->with(['successMassage'=>'Restaurant Category Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->findCategoryData($id);
        $this->authorize('delete', $category);
        $category->delete();
        return redirect()->route('admin.restaurantcategory.index')->with(['successMassage'=>'Restaurant Category Deleted Successfully.']);
    }

    private function getAllRestaurantCategory()
    {
        return RestaurantCategory::all();
    }

    private function findCategoryData($id)
    {
        return RestaurantCategory::find($id);
    }
}
