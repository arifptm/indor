<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autoresponder;
use Auth;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $u = Auth::user();
        if ($u->hasRole('super')){
            return 'supuer';
        } elseif($u->hasRole('user')){
            return $this->userDashboard();
        }
    }

    public function userDashboard(){
        return view('user_dashboard');
    }

}
