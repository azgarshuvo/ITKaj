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
        Route::get('view', ['as' => 'my_profile_view', 'uses' => 'ProfileController@getMyProfileView']);
        Route::post('change-rofile-img', ['as' => 'changeProfileImg', 'uses' => 'ProfileController@ChangeProfileImg']);



        Route::get('project/list', ['as' => 'my_project_list', 'uses' => 'ProfileController@getMyProjectList']);
        Route::get('job/approvedList', ['as' => 'job_approved_list', 'uses' => 'ProfileController@getJobApprovedList']);
        Route::get('job/disapprovedList', ['as' => 'job_disapproved_list', 'uses' => 'ProfileController@getJobDisapprovedList']);
    	Route::get('job/doneList', ['as' => 'job_done_list', 'uses' => 'ProfileController@getJobDoneList']);
        Route::get('job/doneList', ['as' => 'job_done_list', 'uses' => 'ProfileController@getJobDoneList']);
        Route::get('job/interestedList', ['as' => 'job_interested_list', 'uses' => 'ProfileController@getJobInterestedList']);
        Route::get('job/ongoingList', ['as' => 'job_ongoing_list', 'uses' => 'ProfileController@getJobOngoingList']);
        Route::get('job/freelancerDoneList', ['as' => 'freelancer_job_done_list', 'uses' => 'ProfileController@getFreelancerJobDoneList']);


    	Route::post('change/password', ['as' => 'changePassword', 'uses' => 'ProfileController@ChangePassword']);
    	Route::post('change/changeprofile', ['as' => 'changeProfile', 'uses' => 'ProfileController@changeProfile']);
    	Route::post('change/changecompany', ['as' => 'changeCompany', 'uses' => 'ProfileController@changeCompany']);
    });




});



Route::group(['prefix' => 'admin'], function (){
    Route::get('login', ['as' =>'adminLogin', 'uses' => 'adminController\AdminLoginController@getLoginView']);
    Route::get('login/execute', ['as' =>'adminPostLogin', 'uses' => 'adminController\AdminLoginController@postLogin']);

    Route::get('dashboard', ['as' =>'dashboard', 'uses' => 'adminController\AdminDashboardController@getDashboard','middleware' => 'admin']);

    //Admin
    Route::get('addAdmin', ['as' =>'adminAdd', 'uses' => 'adminController\AdminCrudController@addAdmin']);
    Route::get('adminList', ['as' =>'adminList', 'uses' => 'adminController\AdminCrudController@listOfAdmin']);
    Route::get('/insertAdmin', ['as' =>'insertAdmin', 'uses' => 'adminController\AdminCrudController@insertAdmin']);
    Route::get('/adminDetails/{id}', ['as' =>'adminDetails', 'uses' => 'adminController\AdminCrudController@adminDetails']);
    Route::get('/adminEdit/{id}', ['as' =>'adminEdit', 'uses' => 'adminController\AdminCrudController@adminEdit']);
    Route::get('/adminDelete/{id}', ['as' =>'adminDelete', 'uses' => 'adminController\AdminCrudController@adminDelete']);

    //Category
    Route::get('category/addCategory', ['as' =>'categoryAdd', 'uses' => 'adminController\CategoryCrudController@addCategory']);
    Route::post('category/insertCategory', ['as' =>'insertCategory', 'uses' => 'adminController\CategoryCrudController@insertCategory']);
    Route::get('category/categoryList', ['as' =>'categoryList', 'uses' => 'adminController\CategoryCrudController@listOfCategory']);
    Route::get('category/categoryDelete/{id}', ['as' =>'categoryDelete', 'uses' => 'adminController\CategoryCrudController@deleteCategory']);
    Route::get('category/categoryEdit/{id}', ['as' =>'categoryEdit', 'uses' => 'adminController\CategoryCrudController@editCategory']);


    Route::get('freelancer/list', ['as' =>'freelancer_list', 'uses' => 'adminController\AdminDashboardController@getFreelancerList']);
    Route::get('employeer/list', ['as' =>'employeer_list', 'uses' => 'adminController\AdminDashboardController@getEmployeerList']);


    /*admin job controller start*/
    Route::group(['prefix' => 'job'], function (){

        Route::get('list', ['as' =>'jobList', 'uses' => 'adminController\AdminJobController@getJoblist']);
        Route::get('list/approve', ['as' =>'jobApproveList', 'uses' => 'adminController\AdminJobController@getApproveJoblist']);
        Route::get('list/disapprove', ['as' =>'jobDisApproveList', 'uses' => 'adminController\AdminJobController@getDisapproveJoblist']);
        Route::get('details/{id}', ['as' =>'jobDetails', 'uses' => 'adminController\AdminJobController@getJobDetails']);
        Route::get('edit/{id}', ['as' =>'jobEdit', 'uses' => 'adminController\AdminJobController@getJobEditView']);
        Route::get('delete/{id}', ['as' =>'jobDelete', 'uses' => 'adminController\AdminJobController@getJobDelete']);
    });
    /*admin job controller end*/

});




Route::group(['prefix' => 'job','middleware' => ['auth', 'approve']], function (){
    Route::get('post', ['as' =>'JobPost', 'uses' => 'JobController@getJobPost','middleware' => 'employer']);
    Route::post('post/execute', ['as' =>'joabPost', 'uses' => 'JobController@PostJobPost','middleware' => 'employer']);
    Route::get('description', ['as' =>'JobDescription', 'uses' => 'JobController@getJobDescription']);
    Route::get('search', ['as' => 'jobSearch', 'uses' => 'JobController@getJobSearch','middleware' => 'freelancer']);
    Route::get('attachment/download', ['as' => 'attachmentDownload', 'uses' => 'JobController@getDownload','middleware' => 'freelancer']);

});


Route::get('email/confirmation', ['as' => 'sendToken', 'uses' => 'RegistrationController@EmailToken']);
Route::get('email-confirmation-notification', ['as' => 'verifyEmail', 'uses' => 'RegistrationController@EmailConfirmation','middleware' => 'auth']);
Route::get('email-confirmation-success', ['as' => 'verifyEmailSuccess', 'uses' => 'RegistrationController@EmailConfirmationSuccess']);
Route::get('email-confirmation-fail', ['as' => 'verifyEmailFail', 'uses' => 'RegistrationController@EmailConfirmationFail']);







Route::group(['prefix' => 'freelancer','middleware' => ['auth', 'approve']], function (){
   Route::get('search', ['as' => 'freelancerSearch', 'uses' => 'FreelancerController@getFreelancerSearch','middleware' => 'employer']);
});
