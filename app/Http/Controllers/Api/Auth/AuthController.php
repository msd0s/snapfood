<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    use HasApiTokens, HasFactory, Notifiable;

    public function register(StoreRegisterRequest $request)
    {
        try {
            $request->validated();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'status' => User::REGISTER_STATUS,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function login(Request $request)
    {
        try {
            $input = $request->all();
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
            {
                $user = User::where('email', $request->email)->first();
                return response()->json([
                    'status' => true,
                    'message' => 'User Logged In Successfully',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => 'Username Or Password Was Incorrect!'
                ], 401);
            }
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
