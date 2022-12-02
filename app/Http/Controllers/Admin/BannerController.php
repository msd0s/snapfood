<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Seller\Functions\FoodFunctionsTrait;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Models\Banner;
use App\Models\Discount;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Rules\PhoneRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    use FoodFunctionsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Banner::class);
        $banners = Banner::distinct()->paginate(5);
        return view('panel.Admin.banner.showBanner',compact(['banners']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Banner::class);
        return view('panel.Admin.banner.newBanner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $this->authorize('create', Banner::class);
        $request->validated();

        $pictureFileName = time().'-'.$request->file('picture')->getClientOriginalName();
        $uploadImage = Storage::disk('public')->putFileAs('banners/',$request->file('picture'),$pictureFileName);

        $data = [
            'title'=>$request->title,
            'url'=>$request->url,
            'alternate'=>$request->alternate,
            'picture'=>$pictureFileName,
            'status'=>$request->status,
        ];

        Banner::create($data);
        return redirect()->back()->with(['successMassage'=>'New Banner Created Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        $this->authorize('view', $banner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $this->authorize('update', $banner);
        return view('panel.Admin.banner.editBanner',['banner'=>$banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $this->authorize('update', $banner);
        $request->validated();

        $pictureFileName = time().'-'.$request->file('picture')->getClientOriginalName();
        $uploadImage = Storage::disk('public')->putFileAs('banners/',$request->file('picture'),$pictureFileName);

        $data = [
            'title'=>$request->title,
            'url'=>$request->url,
            'alternate'=>$request->alternate,
            'picture'=>$pictureFileName,
            'status'=>$request->status,
        ];
        $banner->update($data);
        return redirect()->back()->with(['successMassage'=>'Banner Data Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $this->authorize('delete', $banner);
        $banner->delete();
        return redirect()->route('admin.banner.index')->with(['successMassage'=>'Banner Deleted Successfully.']);
    }
}
