<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');




Route::group(['middleware' => ['role:user']], function() {
	Route::get('/profile', 'UserController@profile');
	Route::patch('/profile/update', 'UserController@updateProfile');
});


Route::group(['prefix'=>'manage', 'middleware' => ['role:super']], function() {
	Route::resource('users', 'UserController');
});