<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autoresponder;
use Auth;

class DashboardController extends Controller
{
    public function index(){
	    $u = Auth::user();
	    if ($u->hasRole('super')){
	    	return 'supuer';
	    } elseif($u->hasRole('user')){
	    	return 'user';
	    }


	    $a = Autoresponder::take(10);
    	dd($a);
    }
}
