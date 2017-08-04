<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Role;
use App\User;
use App\Profile;
use File;
use Illuminate\Support\Facades\Auth;

use App\SocialLogin;
use App\Exceptions\SocialAuthException;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Jobs\SendRegisterVerificationEmail;

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

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    //$user = Socialite::driver('facebook')->user();
    // $user->getId();
    // $user->getNickname();
    // $user->getName();
    // $user->getEmail();
    // $user->getAvatar();
    // public function handleProviderCallback($provider)
    // {        
        
    //     $fb_user = Socialite::driver('facebook')->user();
    //     $user_exist = User::whereEmail($fb_user->email)->first();
        
    //     if(count($user_exist) == 0){
    //         $user = new User;
    //         $user->name = $fb_user->name;
    //         $user->email = $fb_user->email;
    //         $user->password = bcrypt(str_random(7));        
    //         $user->save();   
    //         $user->attachRole('user');

    //         $profile = new Profile;
    //         $profile->user_id = $user->id;

    //         $filename = time().".jpg";
    //         $fileContents = file_get_contents($fb_user->avatar);
    //         File::put(public_path() . '/assets/profiles/' . $filename , $fileContents);
    //         $profile->image = $filename;
    //         $profile->save();

    //         Auth::login($user);
    //     } else {
    //         Auth::login($user_exist);   
    //     }
        
    //     return redirect('/home');
    // }  


    public function handleProviderCallback($provider)
    {
        try {
            $socialUserInfo = Socialite::driver($provider)->user();
            $user = User::whereEmail($socialUserInfo->getEmail())->first();
            if(count($user) == 0 ){
                $user = new User;
                $user->email = $socialUserInfo->getEmail();
                $user->name = $socialUserInfo->getName();
                $user->password = bcrypt(str_random(7));
                $user->email_token = base64_encode($socialUserInfo->getEmail());    
                $user->save();
                $user->attachRole('user');     

                $filename = time().".jpg";
                $fileContents = file_get_contents($socialUserInfo->getAvatar());
                File::put(public_path() . '/assets/profiles/' . $filename , $fileContents);
                $profile = new Profile;
                $profile->image = $filename;
                $user->profile()->save($profile);
                dispatch(new SendRegisterVerificationEmail($user));
            } 
            
            
            $provider = "{$provider}_id";
            $social = $user->socialLogin ?: new SocialLogin;
            $social->{$provider} = $socialUserInfo->getId();
            $user->socialLogin()->save($social);                

            if($user->verified == 0){
                dispatch(new SendRegisterVerificationEmail($user));
                return view('confirmation.verification');  
            } else {            
                Auth()->login($user);
                return redirect('/');
            }
           
        } catch (Exception $e) {
            throw new SocialAuthException("failed to authenticate with $provider");
        }
    }
}
