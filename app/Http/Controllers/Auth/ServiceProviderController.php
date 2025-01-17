<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServiceProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {

        try {
            $SocialUser = Socialite::driver($provider)->user();
            $user = User::where([
                'provider' => $provider,
                'provider_id' => $SocialUser->id
            ])->first();
            if (!$user) {
                $password = Str::random(12);
                $user = User::create([
                    'name' => $SocialUser->name ? $SocialUser->getName() : $SocialUser->nickname,
                    'email' => $SocialUser->getEmail(),
                    'username' => User::generateUserName($SocialUser->getNickname()),
                    'password' => $password,
                    'provider' => $provider,
                    'provider_id' => $SocialUser->getId(),
                    'provider_token' => $SocialUser->token,
                ]);
                $user->sendEmailVerificationNotification();
                $user->update([
                    'password' => bcrypt($password)
                ]);
            }
            Auth::login($user);
            return redirect('/dashboard');
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }
}
