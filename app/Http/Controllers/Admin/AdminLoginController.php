<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function indexLogin(){
        return view('admin-auth.login');
    }

    public function adminLogout (){
        Auth::guard('admin')->logout();
        return redirect(route('login.index'));
    }

    public function loginAdmin(Request $request){
        $credentials = request(['email','password']);
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect(route('dashboard'));
        }
        return redirect()->back()->withInput($request->only('email'))->with('error', 'Wrong Credentials');
    }
}
