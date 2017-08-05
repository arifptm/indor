<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded =['id'];

    public function user(){
    	return $this->hasMany('App\User');
    }
    
	public function getMaxSubscriberAttribute($v){
		if ( ! \Request::is('*/edit')) {  		
			return number_format($v,0,',','.');
		} else {
			return $v;
		}	
	}

	public function getMaxDailyImportAttribute($v){
		if ( ! \Request::is('*/edit')) {  		
			return number_format($v,0,',','.');
		} else {
			return $v;
		}	
	}


}
