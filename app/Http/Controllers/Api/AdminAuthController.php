<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Resources\AdminResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ApiCreateAdminRequest;
use App\Http\Requests\ApiLoginAdminRequest;

class AdminAuthController extends Controller
{
    public function login (ApiLoginAdminRequest $request) {
        $credentials = request(['email','password']);
        if(!Auth::guard('admin')->attempt($credentials)){
            return $this->jsonResponse(false, [], "Wrong Credentials");
        }
        $admin = Admin::where('email', $request->email)->first();
        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                $token = $admin->createToken('Laravel Password Grant Client')->accessToken;
                $data = [
                    'admin' => new AdminResource($admin),
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ];
                return $this->jsonResponse(true, $data, "Admin login successfully");
            }
        } 
    }

    public function createAdmin(ApiCreateAdminRequest $request){
        $admin = new Admin([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $admin->save();
        $token = $admin->createToken('Laravel Password Grant Client')->accessToken;
        $data = [
            'admin' => new AdminResource($admin),
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
        return $this->jsonResponse(true, $data, "Create Admin successfully");
    }

    public function updateProfile(Request $request){
        $admin = Auth::guard('admin-api')->user();
        $admin->update($request->except('password'));
        $data = [
            'admin' => new AdminResource($admin),
        ];
        return $this->jsonResponse(true, $data, "Profile Successfully Updated");
    }

    public function getAdmin(){
        $admin = Auth::guard('admin-api')->user();
        // dd($user);
        return response()->json($admin);
    }
}
