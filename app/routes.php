<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array( 'as' => 'login', function()
{
	return View::make('login');
}));

Route::post('login/check', array( 'as' => 'loginCheck', 'uses' => 'LoginController@check'));

Route::get('register',  array( 'as' => 'register', function()
{
	return View::make('register');
}));

Route::post('register/check', 'RegisterController@check');

Route::get('register/confirmation/{confirmation}', array('as' => 'registerConfirmation',  'uses' => 'RegisterController@confirmation' ));

// Lang------------------------------------------------------------------------

Route::get('lang/{lang}', function($lang)
{
	Session::put('localeLang', $lang);
	return Redirect::to('/');
});

// Resources ------------------------------------------------------------------

Route::resource('user' , 'UserController' );



