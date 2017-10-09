<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@getHome']);


Route::get('/login', ['as'=>'login', 'uses' => 'LoginController@getLogin']);

Route::get('/logout', ['as'=>'logout', 'uses' => 'LogoutController@getLogout']);

Route::post('/login/execute', ['as'=>'postLogin', 'uses' => 'LoginController@postLogin']);

Route::group(['prefix' => 'user'], function () {
	
    Route::get('registration', ['as' => 'registration', 'uses' => 'RegistrationController@getRegistration']);
    Route::post('registration/execute', ['as' => 'postRegistration', 'uses' => 'RegistrationController@postRegistration']);
    Route::get('verrify', ['as' => 'verifyEmail', 'uses' => 'ProfileController@verifyEmail']);
    

    Route::group(['prefix' => 'profile'], function(){
    	Route::get('overall', ['as' => 'profile_overall', 'uses' => 'ProfileController@getProfile']);
    	Route::get('settings', ['as' => 'profile_settings', 'uses' => 'ProfileController@getProfileSettings']);
    	Route::get('myProfile', ['as' => 'myProfile', 'uses' => 'ProfileController@getMyProfile']);
    });
});






Route::group(['prefix' => 'admin'], function (){
    Route::get('dashboard', ['as' =>'dashboard', 'uses' => 'adminController\AdminDashboardController@getDeshboard']);
});