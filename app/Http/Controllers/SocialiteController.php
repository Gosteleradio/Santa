<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class SocialiteController extends Controller
{
   public function loginVk(){
       return Socialite::driver('vkontakte')->redirect();

   }

   public function responseVk(UserRepository $userRepository): \Illuminate\Http\RedirectResponse
   {
       $user = Socialite::driver('vkontakte')->user();
     // dd($user);
       $userInSystem = $userRepository->getUserBySocId($user, 'vkontakte');
     // dd($userInSystem);
       Auth::login($userInSystem);
       return redirect()->route('home');
   }

    public function loginGithub(){
        return Socialite::driver('github')->redirect();

    }

    public function responseGithub(UserRepository $userRepository): \Illuminate\Http\RedirectResponse
    {
        $user = Socialite::driver('github')->user();
        // dd($user);
        $userInSystem = $userRepository->getUserBySocId($user, 'github');
        // dd($userInSystem);
        Auth::login($userInSystem);
        return redirect()->route('home');
    }


}
