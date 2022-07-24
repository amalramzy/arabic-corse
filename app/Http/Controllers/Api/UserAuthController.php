<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ApiCreateUserRequest;
use App\Http\Requests\ApiLoginUserRequest;

class UserAuthController extends Controller
{
    public function createUser(ApiCreateUserRequest $request){
      
        $user = new User([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $user->save();
        $token = $user->createToken('Laravel Password User Auth')->accessToken;
        $data = [
            'user' => new UserResource($user),
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
        return $this->jsonResponse(true, $data, "Create User successfully");
    }

     public function login (ApiLoginUserRequest $request) {
        $credentials = request(['email','password']);
        if(!Auth::attempt($credentials)){
            return $this->jsonResponse(false, [], "Wrong Credentials");
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password User Auth')->accessToken;
                $data = [
                    'User' => new UserResource($user),
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ];
                return $this->jsonResponse(true, $data, "User login successfully");
            }
        }
    }

    public function getUser(){
        $user = Auth::guard('api')->user();
        // dd($user);
        return response()->json($user);
    }

    public function logout(Request $request){
        $user = Auth::guard('api')->user()->token();
        // dd($user);
        $user->revoke();
        return $this->jsonResponse(true, [], "User logged out");
    }

    public function updateProfile(Request $request){
        $user = Auth::guard('api')->user();
        // dd($user);
        $user->update($request->except('password'));
        $data = [
            'user' => new UserResource($user),
        ];
        return $this->jsonResponse(true, $data, "Profile Successfully Updated");
    }
}
