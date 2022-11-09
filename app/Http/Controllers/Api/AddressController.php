<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getAddresses()
    {
        $addresses = auth()->user()->addresses;
        return AddressResource::collection($addresses);
    }

    public function storeAddress(StoreAddressRequest $request)
    {
        try {
            $request->validated();
            $request->merge(['user_id'=>auth()->user()->id]);
            Address::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Address Added Successfully',
            ], 200);
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function setDefaultAddress(Address $address)
    {
        try {
            if ($address->user_id==auth()->user()->id)
            {
                auth()->user()->addresses()->update(['is_default'=>0]);
                $address->update(['is_default'=>1]);
                return response()->json([
                    'status'=> true,
                    'message' => 'Current Address Updated Successfully'
                ],200);
            }else
            {
                return $this->accessDenied();
            }
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function deleteAddress(Address $address)
    {
        try {
            if ($address->user_id==auth()->user()->id)
            {
                $address->delete();
                return response()->json([
                    'status'=> true,
                    'message' => 'Address Deleted Successfully'
                ],200);
            }else
            {
                return $this->accessDenied();
            }
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    private function accessDenied()
    {
        return response()->json([
            'status'=> false,
            'message' => 'You Dont Have Access To This Address'
        ],403);
    }
}
