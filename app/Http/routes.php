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




    Route::group(['prefix' => 'profile'], function(){
    	Route::get('overall', ['as' => 'profile_overall', 'uses' => 'ProfileController@getProfile']);
    	Route::get('settings', ['as' => 'profile_settings', 'uses' => 'ProfileController@getProfileSettings']);
    	Route::get('myProfile', ['as' => 'my_profile', 'uses' => 'ProfileController@getMyProfile']);
    	Route::get('myProjects', ['as' => 'my_projects', 'uses' => 'ProfileController@getMyProjects']);

    	Route::post('change/password', ['as' => 'changePassword', 'uses' => 'ProfileController@ChangePassword']);
    	Route::post('change/changeprofile', ['as' => 'changeProfile', 'uses' => 'ProfileController@changeProfile']);
    	Route::post('change/changecompany', ['as' => 'changeCompany', 'uses' => 'ProfileController@changeCompany']);
    });




});



Route::group(['prefix' => 'admin'], function (){
    Route::get('login', ['as' =>'adminLogin', 'uses' => 'adminController\AdminLoginController@getLoginView']);
    Route::get('login/execute', ['as' =>'adminPostLogin', 'uses' => 'adminController\AdminLoginController@postLogin']);

    Route::get('dashboard', ['as' =>'dashboard', 'uses' => 'adminController\AdminDashboardController@getDashboard']);










    Route::get('addAdmin', ['as' =>'adminAdd', 'uses' => 'adminController\AdminDashboardController@addAdmin']);
    Route::get('adminList', ['as' =>'adminList', 'uses' => 'adminController\AdminDashboardController@listOfAdmin']);
    Route::get('addCategory', ['as' =>'categoryAdd', 'uses' => 'adminController\AdminDashboardController@addCategory']);
    Route::get('categoryList', ['as' =>'categoryList', 'uses' => 'adminController\AdminDashboardController@listOfCategory']);

});




Route::group(['prefix' => 'job'], function (){
    Route::get('post', ['as' =>'JobPost', 'uses' => 'JobController@getJobPost']);
    Route::get('description', ['as' =>'JobDescription', 'uses' => 'JobController@getJobDescription']);
    Route::get('search', ['as' => 'jobSearch', 'uses' => 'JobController@getJobSearch']);

});






Route::get('email-confirmation-notification', ['as' => 'verifyEmail', 'uses' => 'RegistrationController@EmailConfirmation']);







Route::group(['prefix' => 'freelancer'], function (){
   Route::get('search', ['as' => 'freelancerSearch', 'uses' => 'FreelancerController@getFreelancerSearch']);
});