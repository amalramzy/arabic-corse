<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        // $provider = $request->provider_name;
        return Socialite::driver($provider)->stateless()->redirect();
    }


    public function handleProviderCallback($provider)
    {
        // $provider = $request->provider_name;
        $user = Socialite::driver($provider)->stateless()->user();
        $this->_registerOrLoginUser($user);
        
        return redirect('/home');
        
    }

    public function _registerOrLoginUser(Request $request)
    {
        $getUser  = User::where('email', '=', $user->email)->first();
       if (!$getUser) {
            $getUser = new User([
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => time(),
                'provider_id' => $user->id,
            ]);
            $getUser->save();
        }
        Auth::login($user);
    }

}
