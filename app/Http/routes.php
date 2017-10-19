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

        Route::get('', ['as' => 'myProfile', 'uses' => 'ProfileController@getMyProfile']);

    	Route::get('overall', ['as' => 'profileOverall', 'uses' => 'ProfileController@getProfile']);
    	Route::get('settings', ['as' => 'profileSettings', 'uses' => 'ProfileController@getProfileSettings']);
        Route::get('projects/list', ['as' => 'projectsList', 'uses' => 'ProfileController@getProjectsList']);
        Route::get('view/{id}', ['as' => 'my_profile_view', 'uses' => 'ProfileController@getMyProfileView']);
        Route::post('change-profile-img', ['as' => 'changeProfileImg', 'uses' => 'ProfileController@ChangeProfileImg']);


        Route::group(['prefix' => 'project'], function(){
            Route::get('approved/list', ['as' => 'projectApprovedList', 'uses' => 'ProfileController@getProjectApprovedList']);
            Route::get('disapproved/list', ['as' => 'projectDisapprovedList', 'uses' => 'ProfileController@getJobDisapprovedList']);
            Route::get('done/list', ['as' => 'projectDoneList', 'uses' => 'ProfileController@getJobDoneList']);
            Route::get('interested/list', ['as' => 'projectInterestedList', 'uses' => 'ProfileController@getJobInterestedList']);
            Route::get('ongoing/list', ['as' => 'projectOngoingList', 'uses' => 'ProfileController@getJobOngoingList']);
        });

    	Route::post('change/password', ['as' => 'changePassword', 'uses' => 'ProfileController@ChangePassword']);
    	Route::post('change/changeprofile', ['as' => 'changeProfile', 'uses' => 'ProfileController@changeProfile']);
    	Route::post('change/changecompany', ['as' => 'changeCompany', 'uses' => 'ProfileController@changeCompany']);





        Route::post('add/education', ['as'=>'addEdcation', 'uses' => 'ProfileController@postEducationAdd']);
        Route::post('add/employment', ['as'=>'addEmployment', 'uses' => 'ProfileController@postEmploymentAdd']);
    });




});



Route::group(['prefix' => 'admin'], function (){
    Route::get('login', ['as' =>'adminLogin', 'uses' => 'adminController\AdminLoginController@getLoginView']);
    Route::get('login/execute', ['as' =>'adminPostLogin', 'uses' => 'adminController\AdminLoginController@postLogin']);

    Route::get('dashboard', ['as' =>'dashboard', 'uses' => 'adminController\AdminDashboardController@getDashboard','middleware' => 'admin']);

    //Admin
    Route::get('user/addAdmin', ['as' =>'adminAdd', 'uses' => 'adminController\AdminCrudController@addAdmin']);
    Route::get('user/adminList', ['as' =>'adminList', 'uses' => 'adminController\AdminCrudController@listOfAdmin']);
    Route::post('user/insertAdmin', ['as' =>'insertAdmin', 'uses' => 'adminController\AdminCrudController@insertAdmin']);
    Route::get('user/adminDetails/{id}', ['as' =>'adminDetails', 'uses' => 'adminController\AdminCrudController@adminDetails']);
    Route::get('user/adminEdit/{id}', ['as' =>'adminEdit', 'uses' => 'adminController\AdminCrudController@adminEdit']);
    Route::get('user/adminDelete/{id}', ['as' =>'adminDelete', 'uses' => 'adminController\AdminCrudController@adminDelete']);
    Route::post('user/adminUpdate/{id}', ['as' =>'adminUpdate', 'uses' => 'adminController\AdminCrudController@adminUpdate']);

    //Category
    Route::get('category/addCategory', ['as' =>'categoryAdd', 'uses' => 'adminController\CategoryCrudController@addCategory']);
    Route::post('category/insertCategory', ['as' =>'insertCategory', 'uses' => 'adminController\CategoryCrudController@insertCategory']);
    Route::get('category/categoryList', ['as' =>'categoryList', 'uses' => 'adminController\CategoryCrudController@listOfCategory']);
    Route::get('category/categoryDelete/{id}', ['as' =>'categoryDelete', 'uses' => 'adminController\CategoryCrudController@deleteCategory']);
    Route::get('category/categoryEdit/{id}', ['as' =>'categoryEdit', 'uses' => 'adminController\CategoryCrudController@editCategory']);
    Route::post('category/categoryUpdate/{id}', ['as' =>'categoryUpdate', 'uses' => 'adminController\CategoryCrudController@updateCategory']);


    //skill
    Route::get('skill/addSkill', ['as' =>'skillAdd', 'uses' => 'adminController\SkillCrudController@getSkillAdd']);
    Route::post('skill/insertSkill', ['as' =>'skillInsert', 'uses' => 'adminController\SkillCrudController@postSkillAdd']);
    Route::get('skill/list', ['as' =>'skillList', 'uses' => 'adminController\SkillCrudController@getSkillList']);
    Route::get('skill/edit/{id}', ['as' =>'skillEdit', 'uses' => 'adminController\SkillCrudController@getSkillEdit']);
    Route::post('skill/update/{id}', ['as' =>'skillUpdate', 'uses' => 'adminController\SkillCrudController@postSkillUpdate']);
    Route::get('skill/Delete/{id}', ['as' =>'skillDelete', 'uses' => 'adminController\SkillCrudController@getSkillDelete']);






    Route::get('freelancer/list', ['as' =>'freelancer_list', 'uses' => 'adminController\AdminDashboardController@getFreelancerList']);
    Route::get('employeer/list', ['as' =>'employeer_list', 'uses' => 'adminController\AdminDashboardController@getEmployeerList']);


    /*admin job controller start*/
    Route::group(['prefix' => 'job'], function (){

        Route::get('list', ['as' =>'jobList', 'uses' => 'adminController\AdminJobController@getJoblist']);
        Route::get('list/approve', ['as' =>'jobApproveList', 'uses' => 'adminController\AdminJobController@getApproveJoblist']);
        Route::get('list/disapprove', ['as' =>'jobDisApproveList', 'uses' => 'adminController\AdminJobController@getDisapproveJoblist']);
        Route::get('details/{id}', ['as' =>'jobDetails', 'uses' => 'adminController\AdminJobController@getJobDetails']);
        Route::get('edit/{id}', ['as' =>'jobEdit', 'uses' => 'adminController\AdminJobController@getJobEditView']);
        Route::post('update/{id}', ['as' =>'jobUpdate', 'uses' => 'adminController\AdminJobController@postJobUpdate']);
        Route::get('delete/{id}', ['as' =>'jobDelete', 'uses' => 'adminController\AdminJobController@getJobDelete']);
        Route::get('edit/approve/{id}', ['as' =>'jobApproveEdit', 'uses' => 'adminController\AdminJobController@getJobApproveEdit']);
        Route::post('update/approve/{id}', ['as' =>'jobApproveUpdate', 'uses' => 'adminController\AdminJobController@postJobApproveUpdate']);
        Route::get('delete/approve/{id}', ['as' =>'jobApproveDelete', 'uses' => 'adminController\AdminJobController@getJobApproveDelete']);
        Route::get('edit/disapprove/{id}', ['as' =>'jobDisapproveEdit', 'uses' => 'adminController\AdminJobController@getJobDisapproveEdit']);
        Route::post('update/disapprove/{id}', ['as' =>'jobDisapproveUpdate', 'uses' => 'adminController\AdminJobController@postJobDisapproveUpdate']);
        Route::get('delete/disapprove/{id}', ['as' =>'jobDisapproveDelete', 'uses' => 'adminController\AdminJobController@getJobDisapproveDelete']);


    });
    /*admin job controller end*/

});




Route::group(['prefix' => 'job','middleware' => ['auth', 'approve']], function (){
    Route::get('post', ['as' =>'JobPost', 'uses' => 'JobController@getJobPost','middleware' => 'employer']);
    Route::post('post/execute', ['as' =>'joabPost', 'uses' => 'JobController@PostJobPost','middleware' => 'employer']);
    Route::get('description', ['as' =>'JobDescription', 'uses' => 'JobController@getJobDescription']);
    Route::get('search', ['as' => 'jobSearch', 'uses' => 'JobController@getJobSearch','middleware' => 'freelancer']);
    Route::get('attachment/download', ['as' => 'attachmentDownload', 'uses' => 'JobController@getDownload']);


});

/*Route for own job */
Route::get('myjob/{id}', ['as' =>'MyJobDescription', 'uses' => 'JobController@getOwnJobDescription']);

/*Setup Milestone*/
Route::get('setupMilestone/{jobid}', ['as' =>'setupMilestone', 'uses' => 'MilestoneController@setMilestone']);


Route::get('email/confirmation', ['as' => 'sendToken', 'uses' => 'RegistrationController@EmailToken']);
Route::get('email-confirmation-notification', ['as' => 'verifyEmail', 'uses' => 'RegistrationController@EmailConfirmation','middleware' => 'auth']);
Route::get('email-confirmation-success', ['as' => 'verifyEmailSuccess', 'uses' => 'RegistrationController@EmailConfirmationSuccess']);
Route::get('email-confirmation-fail', ['as' => 'verifyEmailFail', 'uses' => 'RegistrationController@EmailConfirmationFail']);







Route::group(['prefix' => 'freelancer','middleware' => ['auth', 'approve']], function (){
   Route::get('search', ['as' => 'freelancerSearch', 'uses' => 'FreelancerController@getFreelancerSearch','middleware' => 'employer']);
});

























Route::get('create_paypal_plan', 'PaypalController@create_plan');
Route::get('/subscribe/paypal', 'PaypalController@paypalRedirect')->name('paypal.redirect');
Route::get('/subscribe/paypal/return', 'PaypalController@paypalReturn')->name('paypal.return');