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

    Route::get('verrify/email', ['as' => 'verifyEmail', 'uses' => 'ProfileController@verifyEmail']);


    Route::group(['prefix' => 'profile'], function(){
    	Route::get('overall', ['as' => 'profile_overall', 'uses' => 'ProfileController@getProfile']);
    	Route::get('settings', ['as' => 'profile_settings', 'uses' => 'ProfileController@getProfileSettings']);
    	Route::get('myProfile', ['as' => 'my_profile', 'uses' => 'ProfileController@getMyProfile']);
    	Route::get('myProjects', ['as' => 'my_projects', 'uses' => 'ProfileController@getMyProjects']);

    	Route::post('change/password', ['as' => 'changePassword', 'uses' => 'ProfileController@ChangePassword']);
    });




});



Route::group(['prefix' => 'admin'], function (){
    Route::get('login', ['as' =>'adminLogin', 'uses' => 'adminController\AdminLoginController@getLoginView']);
    Route::get('login/execute', ['as' =>'adminPostLogin', 'uses' => 'adminController\AdminLoginController@postLogin']);

    Route::get('dashboard', ['as' =>'dashboard', 'uses' => 'adminController\AdminDashboardController@getDashboard']);










    Route::get('add', ['as' =>'add', 'uses' => 'adminController\AdminDashboardController@addAdmin']);
    Route::get('list', ['as' =>'list', 'uses' => 'adminController\AdminDashboardController@listOfAdmin']);


});




Route::group(['prefix' => 'job'], function (){
    Route::get('post', ['as' =>'post', 'uses' => 'JobController@getPostJob']);
});
