<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\UpdateProfileRequest;
use App\Http\Requests\UpdateAvatarRequest;
use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use App\Rules\MelliCodeRule;
use App\Rules\MobileRule;
use App\Rules\PhoneRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profileForm()
    {
        return view('panel.profile.editProfile');
    }

    public function updateAvatar(UpdateAvatarRequest $request,$id)
    {
        $request->validated();
        $avatarFileName = time().'-'.$request->file('avatar')->getClientOriginalName();
        $uploadImage = Storage::disk('public')->putFileAs('profiles/',$request->file('avatar'),$avatarFileName);

        User::find(auth()->user()->id)->update(['avatar'=>$avatarFileName]);
        return redirect()->back()->with('successMassage','Avatar Was Updated Successfully.');
    }

    public function updateProfile(UpdateProfileRequest $request,$id)
    {
        $request->validated();

        $user = User::where('id',auth()->user()->id)->update([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'melli_code' => $request->melli_code,
            'mobile' => $request->mobile,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('successMassage','Profile Data Was Updated Successfully.');
    }

    public function dashboard()
    {
        $orders = Order::distinct()->where('user_id',auth()->user()->id)->where('status',1)->where('orderstatus_id','!=',1)->paginate(5);
        return view('panel.index',compact(['orders']));
    }

    public function showOrderFoods(Order $order)
    {
        $this->authorize('view', auth()->user());
        $orderFoods = $order->orderfoods;
        return view('panel.User.orders.showOrderFoods',compact(['orderFoods']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
