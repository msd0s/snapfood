<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Functions\ProfileFunctionsTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdateProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use ProfileFunctionsTrait;
    public function getProfile()
    {
        $userData = auth()->user();
        return ProfileResource::make($userData);
    }

    public function updateProfile(UpdateProfileRequest $request,User $profile)
    {
        try {
            if ($profile->id==auth()->user()->id)
            {
                $data = $request->validated();
                $data['password'] = $this->bcryptPassword($data['password']);
                $profile->update($data);
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

}
