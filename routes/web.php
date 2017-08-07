<?php

Route::get('/', function () {return redirect('login');});

Auth::routes();




Route::get('/email/verify/{token}', 'Auth\RegisterController@verify');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');




Route::group(['middleware' => ['role:user|super']], function() {
	Route::get('/profile', 'UserController@profile');
	Route::patch('/profile/update', 'UserController@updateProfile');

	Route::resource('autoresponders', 'AutoresponderController');
});


Route::group(['prefix'=>'manage', 'middleware' => ['role:super']], function() {
	Route::resource('users', 'UserController');
	//Route::resource('autoresponders', 'AutoresponderController');
	Route::resource('packages', 'PackageController', ['except'=>['show']]);

});