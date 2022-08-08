<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function myProfile(){
        $user = auth()->user();
        return view('frontend.profile',compact('user'));

    }

    public function UploadAvatar(Request $request)
    {
        $user = auth()->user();
          if ($request->hasFile('avatar')){
            $user->clearMediaCollection('avatar');
            $user->addMedia($request->file('avatar'))->toMediaCollection('avatar');
        }
        return redirect('auth/myProfile')->with('message', 'upload avatar Succesfuly');
    }

    public function update(Request $request){
        $user = auth()->user();
        $user->update($request->except('password'));
        if($request->password){
            $user->password= Hash::make($request->password);
            $user->save();
        }
       
        return redirect('auth/myProfile')->with('message', 'Updated Succesfuly');

    }
}
