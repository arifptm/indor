<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/email/verify/{token}', 'Auth\RegisterController@verify');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/autoresponders/activate/{token}','AutoresponderController@activate');




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