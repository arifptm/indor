<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Jobs\SendRegisterVerificationEmail;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        $messages = [
            'name.required' => 'Kolom nama harus diisi.',
            'name.string' => '',
            'name.min' => '',
            'name.max' => '',
            'email.required'=> '',
            'email.string' => '',
            'email.min' => '',
            'email.max' => '',
            'email.unique' => '',
            'email.email' => '',
            'password.required' => '',
            'password.string' => '',
            'password.min' => '',
            'password_confirm.same' => ''
        ];
        return Validator::make($data, [
            'name' => 'required|string|min:6|max:31',
            'email' => 'required|string|email|min:6|max:31|unique:users',
            'password' => 'required|string|min:6',
            'confirm_password' => 'same:password',
        ], $messages);
    }
    
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => base64_encode($data['email']),
        ]);

        $user->attachRole('user');

        return $user;

    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        dispatch(new SendRegisterVerificationEmail($user));
        return view('confirmation.verification');
    }

    public function verify($token)
    {
        $user = User::where('email_token',$token)->first();
        $user->verified = 1;
        if($user->save()){
            return view('confirmation.register_confirmed',['user'=>$user]);
        }
    }
}
