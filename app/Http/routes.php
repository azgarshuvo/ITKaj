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




    Route::group(['prefix' => 'profile','middleware' => ['auth', 'approve']], function(){
    	Route::get('overall', ['as' => 'profile_overall', 'uses' => 'ProfileController@getProfile']);
    	Route::get('settings', ['as' => 'profile_settings', 'uses' => 'ProfileController@getProfileSettings']);
    	Route::get('myProfile', ['as' => 'my_profile', 'uses' => 'ProfileController@getMyProfile']);
        Route::get('myProjects', ['as' => 'my_projects', 'uses' => 'ProfileController@getMyProjects']);



        Route::get('project/list', ['as' => 'my_project_list', 'uses' => 'ProfileController@getMyProjectList']);
        Route::get('job/approvedList', ['as' => 'job_approved_list', 'uses' => 'ProfileController@getJobApprovedList']);
        Route::get('job/disapprovedList', ['as' => 'job_disapproved_list', 'uses' => 'ProfileController@getJobDisapprovedList']);
    	Route::get('job/doneList', ['as' => 'job_done_list', 'uses' => 'ProfileController@getJobDoneList']);


    	Route::post('change/password', ['as' => 'changePassword', 'uses' => 'ProfileController@ChangePassword']);
    	Route::post('change/changeprofile', ['as' => 'changeProfile', 'uses' => 'ProfileController@changeProfile']);
    	Route::post('change/changecompany', ['as' => 'changeCompany', 'uses' => 'ProfileController@changeCompany']);
    });




});



Route::group(['prefix' => 'admin'], function (){
    Route::get('login', ['as' =>'adminLogin', 'uses' => 'adminController\AdminLoginController@getLoginView']);
    Route::get('login/execute', ['as' =>'adminPostLogin', 'uses' => 'adminController\AdminLoginController@postLogin']);

    Route::get('dashboard', ['as' =>'dashboard', 'uses' => 'adminController\AdminDashboardController@getDashboard','middleware' => 'admin']);


    Route::get('addAdmin', ['as' =>'adminAdd', 'uses' => 'adminController\AdminDashboardController@addAdmin']);
    Route::get('adminList', ['as' =>'adminList', 'uses' => 'adminController\AdminDashboardController@listOfAdmin']);
    Route::get('/adminDetails/{id}', ['as' =>'adminDetails', 'uses' => 'adminController\AdminDashboardController@adminDetails']);
    Route::get('/adminEdit/{id}', ['as' =>'adminEdit', 'uses' => 'adminController\AdminDashboardController@adminEdit']);
    Route::get('/adminDelete/{id}', ['as' =>'adminDelete', 'uses' => 'adminController\AdminDashboardController@adminDelete']);
    Route::get('addCategory', ['as' =>'categoryAdd', 'uses' => 'adminController\AdminDashboardController@addCategory']);
    Route::get('categoryList', ['as' =>'categoryList', 'uses' => 'adminController\AdminDashboardController@listOfCategory']);





    Route::get('freelancer/list', ['as' =>'freelancer_list', 'uses' => 'adminController\AdminDashboardController@getFreelancerList']);
    Route::get('employeer/list', ['as' =>'employeer_list', 'uses' => 'adminController\AdminDashboardController@getEmployeerList']);

});




Route::group(['prefix' => 'job','middleware' => ['auth', 'approve']], function (){
    Route::get('post', ['as' =>'JobPost', 'uses' => 'JobController@getJobPost','middleware' => 'employer']);
    Route::post('post/execute', ['as' =>'joabPost', 'uses' => 'JobController@PostJobPost','middleware' => 'employer']);
    Route::get('description', ['as' =>'JobDescription', 'uses' => 'JobController@getJobDescription']);
    Route::get('search', ['as' => 'jobSearch', 'uses' => 'JobController@getJobSearch','middleware' => 'freelancer']);

});


Route::get('email/confirmation', ['as' => 'sendToken', 'uses' => 'RegistrationController@EmailToken']);
Route::get('email-confirmation-notification', ['as' => 'verifyEmail', 'uses' => 'RegistrationController@EmailConfirmation','middleware' => 'auth']);
Route::get('email-confirmation-success', ['as' => 'verifyEmailSuccess', 'uses' => 'RegistrationController@EmailConfirmationSuccess']);
Route::get('email-confirmation-fail', ['as' => 'verifyEmailFail', 'uses' => 'RegistrationController@EmailConfirmationFail']);







Route::group(['prefix' => 'freelancer','middleware' => ['auth', 'approve']], function (){
   Route::get('search', ['as' => 'freelancerSearch', 'uses' => 'FreelancerController@getFreelancerSearch','middleware' => 'employer']);
});
