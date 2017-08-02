<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //$user = Socialite::driver('facebook')->user();
    // $user->getId();
    // $user->getNickname();
    // $user->getName();
    // $user->getEmail();
    // $user->getAvatar();
    public function handleProviderCallback()
    {        
        
        $fb_user = Socialite::driver('facebook')->user();
        $user_exist = User::whereEmail($fb_user->email)->first();
        
        if(count($user_exist) == 0){
            $user = new User;
            $user->name = $fb_user->name;
            $user->email = $fb_user->email;
            $user->password = bcrypt(str_random(6));        
            $user->save();   
            $user->attachRole('user');
            Auth::login($user);
        } else {
            Auth::login($user_exist);   
        }
        
        return redirect('/home');
    }  
}
