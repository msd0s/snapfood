<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $userData = auth()->user();
        return ProfileResource::make($userData);
    }

    public function updateProfile(Request $request,User $profile)
    {
        try {
            if ($profile->id==auth()->user()->id)
            {
                $profile->update();
                return response()->json([
                    'status'=> true,
                    'message' => 'Profile Updated Successfully'
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
