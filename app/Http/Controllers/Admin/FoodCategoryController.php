<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Functions\FoodCategoryFunctionsTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFoodCategoryRequest;
use App\Http\Requests\UpdateFoodCategoryRequest;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Rules\CategoryIdRule;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    use FoodCategoryFunctionsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', FoodCategory::class);
        $cats = $this->getAllFoodCategory();
        return view('panel.Admin.foodcategory.showFoodCategory',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', FoodCategory::class);
        $cats = $this->getAllFoodCategory();
        return view('panel.Admin.foodcategory.newFoodCategory',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodCategoryRequest $request)
    {
        $this->authorize('create', FoodCategory::class);
        $request->validated();

        FoodCategory::create($request->except(['method','csrf']));
        return redirect()->back()->with(['successMassage'=>'Food Category Created Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foodCategory = $this->findCategoryData($id);
        $this->authorize('view', $foodCategory);
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
        $cats = $this->getAllFoodCategory();
        return view('panel.Admin.foodcategory.editFoodCategory',compact(['catItem','cats']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodCategoryRequest $request, $id)
    {
        $catItem = $this->findCategoryData($id);
        $this->authorize('update', $catItem);
        $request->validated();

        $data = [
            'title'=>$request->title,
            'english_title'=>$request->english_title,
            'parent_id'=>$request->main_id,
            'status'=>$request->status,
        ];
        FoodCategory::where('id',$id)->update($data);
        return redirect()->back()->with(['successMassage'=>'Food Category Updated Successfully.']);
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
        return redirect()->route('admin.foodcategory.index')->with(['successMassage'=>'Food Category Deleted Successfully.']);
    }

}
