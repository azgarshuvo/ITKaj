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
    Route::group(['prefix' => 'profile-setup','middleware' => ['auth', 'approve']], function(){
        Route::get('self', ['as' => 'myProfile', 'uses' => 'ProfileController@getMyProfile']);
        Route::get('overall', ['as' => 'profileOverall', 'uses' => 'ProfileController@getProfile']);
        Route::get('settings', ['as' => 'profileSettings', 'uses' => 'ProfileController@getProfileSettings']);

        Route::get('view/{id}', ['as' => 'my_profile_view', 'uses' => 'ProfileController@getMyProfileView']);
        Route::post('change-profile-img', ['as' => 'changeProfileImg', 'uses' => 'ProfileController@ChangeProfileImg']);



        Route::post('change/password', ['as' => 'changePassword', 'uses' => 'ProfileController@ChangePassword']);
        Route::post('change/changeprofile', ['as' => 'changeProfile', 'uses' => 'ProfileController@changeProfile']);
        Route::post('change/changecompany', ['as' => 'changeCompany', 'uses' => 'ProfileController@changeCompany']);

        Route::post('add/education', ['as'=>'addEdcation', 'uses' => 'ProfileController@postEducationAdd']);
        Route::post('edit/education', ['as'=>'editEducation', 'uses' => 'ProfileController@postEducationEdit']);
        Route::get('delete/education/{id}', ['as'=>'deleteEducation', 'uses' => 'ProfileController@postEducationDelete']);
        Route::post('add/employment', ['as'=>'addEmployment', 'uses' => 'ProfileController@postEmploymentAdd']);
        Route::post('edit/employment', ['as'=>'editEmployment', 'uses' => 'ProfileController@postEmploymentEdit']);
        Route::get('delete/employment/{id}', ['as'=>'deleteEmployment', 'uses' => 'ProfileController@postEmploymentDelete']);

    });

    Route::group(['prefix' => 'profile','middleware' => ['auth', 'approve']], function(){

        Route::get('projects/list', ['as' => 'projectsList', 'uses' => 'ProfileController@getProjectsList']);


        Route::group(['prefix' => 'project'], function(){
            Route::get('approved/list', ['as' => 'projectApprovedList', 'uses' => 'JobController@getProjectApprovedList']);
            Route::get('disapproved/list', ['as' => 'projectDisapprovedList', 'uses' => 'JobController@getJobDisapprovedList']);
            Route::get('done/list', ['as' => 'projectDoneList', 'uses' => 'JobController@getJobDoneList']);
            Route::get('interested/list', ['as' => 'projectInterestedList', 'uses' => 'JobController@getJobInterestedList']);
            Route::get('ongoing/list', ['as' => 'projectOngoingList', 'uses' => 'JobController@getJobOngoingList']);
            Route::get('on-going/list', ['as' => 'freelancerProjectOngoingList', 'uses' => 'JobController@FreelancerProjectOngoingList']);

        });

    });


});




Route::get('admin/login', ['as' =>'adminLogin', 'uses' => 'adminController\AdminLoginController@getLoginView']);
Route::get('admin/login/execute', ['as' =>'adminPostLogin', 'uses' => 'adminController\AdminLoginController@postLogin']);
Route::group(['prefix' => 'admin','middleware' => 'admin'], function (){
    Route::get('dashboard', ['as' =>'dashboard', 'uses' => 'adminController\AdminDashboardController@getDashboard']);

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

    //admin milestone release
    Route::post('milestone-transfer', ['as' =>'fundTransfer', 'uses' => 'adminController\MilestoneController@MilestoneFundTransfer']);



    Route::get('freelancer/list', ['as' =>'freelancerList', 'uses' => 'adminController\AdminDashboardController@getFreelancerList']);
    Route::get('freelancer-details/{freelancerid}', ['as' =>'freelancerDetails', 'uses' => 'adminController\AdminDashboardController@getFreelancerDetails']);
    Route::get('freelancer/delete/{id}', ['as' =>'freelancerDelete', 'uses' => 'adminController\AdminDashboardController@getFreelancerDelete']);
    Route::get('freelancer/approve/list', ['as' =>'freelancerApproveList', 'uses' => 'adminController\AdminDashboardController@getFreelancerApproveList']);
    Route::get('freelancer/approve/delete/{id}', ['as' =>'freelancerApproveDelete', 'uses' => 'adminController\AdminDashboardController@getFreelancerApproveDelete']);
    Route::get('freelancer/disapprove/list', ['as' =>'freelancerDisapproveList', 'uses' => 'adminController\AdminDashboardController@getFreelancerDisapproveList']);
    Route::get('freelancer/disapprove/delete{id}', ['as' =>'freelancerDisapproveDelete', 'uses' => 'adminController\AdminDashboardController@getFreelancerDisapproveDelete']);
    Route::get('employeer/list', ['as' =>'employeerList', 'uses' => 'adminController\AdminDashboardController@getEmployeerList']);
    Route::get('employeer/delete/{id}', ['as' =>'employeerDelete', 'uses' => 'adminController\AdminDashboardController@getEmployeerDelete']);
    Route::get('employeer/approve/list', ['as' =>'employeerApproveList', 'uses' => 'adminController\AdminDashboardController@getEmployeerApproveList']);
    Route::get('employeer/approve/delete/{id}', ['as' =>'employeerApproveDelete', 'uses' => 'adminController\AdminDashboardController@getEmployeerApproveDelete']);
    Route::get('employeer/disapprove/list', ['as' =>'employeerDisapproveList', 'uses' => 'adminController\AdminDashboardController@getEmployeerDisapproveList']);
    Route::get('employeer/disapprove/delete/{id}', ['as' =>'employeerDisapproveDelete', 'uses' => 'adminController\AdminDashboardController@getEmployeerDisapproveDelete']);
    //Route::get('interested/freelancer/details/{freelancerid}', ['as' =>'interestedFreelancerDetails', 'uses' => 'adminController\AdminJobController@getInterestedFreelancerDetails']);



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

        Route::get('interested/list', ['as' =>'interestedList', 'uses' => 'adminController\AdminJobController@getInterestedJoblist']);
        Route::get('interested/approve/list', ['as' =>'interestedApproveList', 'uses' => 'adminController\AdminJobController@getInterestedApproveJoblist']);
        Route::get('interested/disapprove/list', ['as' =>'interestedDisapproveList', 'uses' => 'adminController\AdminJobController@getInterestedDisapproveJoblist']);



        Route::post('job-approve', ['as' =>'postJobApprove', 'uses' => 'adminController\AdminJobController@PostJobApprove']);
        Route::post('job-disapprove', ['as' =>'postJobDisapprove', 'uses' => 'adminController\AdminJobController@PostJobDisapprove']);
        Route::post('get-freelancer-list', ['as' =>'getFreelancerList', 'uses' => 'adminController\AdminJobController@getFreelancerList']);
        Route::post('freelancerAssign', ['as' =>'freelancerAssign', 'uses' => 'adminController\AdminJobController@FreelancerAssign']);

        /*This route use for reomve freelancer from assign job contact*/
        Route::get('remove-freelancer/{jobid}', ['as' =>'removeFreelancer', 'uses' => 'adminController\AdminJobController@FreelancerRemove']);
        Route::post('freelancerListAssign', ['as' =>'freelancerListAssign', 'uses' => 'adminController\AdminJobController@FreelancerListAssign']);
        Route::post('add-attachment/{jobid}', ['as' =>'adminAddJobAttachment', 'uses' => 'adminController\AdminJobController@adminAttach']);


        /*Jobe Finish Route*/
        Route::post('accept-job-done', ['as' =>'acceptJobDone', 'uses' => 'adminController\AdminJobController@acceptJobDone']);
        /*Milestone Reset Route*/

        Route::post('milestone-reset', ['as' =>'milestoneReset', 'uses' => 'adminController\AdminJobController@milestoneReset']);


    });
    /*admin job controller end*/

});



/*Common job controller*/
Route::group(['prefix' => 'job','middleware' => ['auth', 'approve','profile']], function (){
    Route::get('post', ['as' =>'JobPost', 'uses' => 'JobController@getJobPost','middleware' => 'employer']);
    Route::post('post/execute', ['as' =>'jobPost', 'uses' => 'JobController@PostJobPost','middleware' => 'employer']);

    Route::get('description/{jobid}', ['as' =>'JobDescription', 'uses' => 'JobController@getJobDescription']);
    Route::get('search', ['as' => 'jobSearch', 'uses' => 'JobController@getJobSearch','middleware' => 'freelancer']);
    Route::get('attachment/download', ['as' => 'attachmentDownload', 'uses' => 'JobController@getDownload']);
    Route::post('apply', ['as' =>'freelancerJobApply', 'uses' => 'JobInterestedController@JobApply','middleware' => 'freelancer']);
    Route::post('interest-remove', ['as' =>'freelancerJobInterestRemove', 'uses' => 'JobInterestedController@deleteInterest','middleware' => 'freelancer']);


    /*Route for own job */
    Route::get('myjob/{id}', ['as' =>'MyJobDescription', 'uses' => 'JobController@getOwnJobDescription']);
    Route::get('delete-my-job/{id}', ['as' =>'deleteMyJob', 'uses' => 'JobController@DeleteMyJob']);
    Route::get('edit-my-job/{jobid}', ['as' =>'editMyjob', 'uses' => 'JobController@EditMyJob']);
    Route::post('attachment-add/{jobid}', ['as' =>'addAttachment', 'uses' => 'JobController@AttachmentAdd']);
    Route::post('job-update/{jobid}', ['as' =>'editJobPost', 'uses' => 'JobController@JobUpdate']);

    /*Setup Milestone*/
    Route::get('setupMilestone/{jobid}', ['as' =>'setupMilestone', 'uses' => 'MilestoneController@SetMilestoneView']);
    Route::post('setupMilestone/{jobid}', ['as' =>'postSetupMilestone', 'uses' => 'MilestoneController@SetMilestone']);
    Route::post('releaseFund/', ['as' =>'releaseFund', 'uses' => 'MilestoneController@ReleaseFund']);

    Route::post('update-milestone/', ['as' =>'updateMilestone', 'uses' => 'MilestoneController@UpdateMilestone']);
    Route::post('delete-milestone/', ['as' =>'deleteMilestone', 'uses' => 'MilestoneController@DeleteMilestone']);

    /*Freelancer milestone*/
    Route::get('my-milestone/{jobid}', ['as' =>'getMilestone', 'uses' => 'MilestoneController@getFreelancerMilestone']);



    /*Freelancer Milestone Done*/
    Route::post('my-milestone/done', ['as' => 'milestoneDoneRequest', 'uses' => 'MilestoneController@postMilestoneDoneRequest']);
    Route::post('my-milestone/done/employer', ['as' => 'milestoneDoneRequestByEmployer', 'uses' => 'MilestoneController@postMilestoneDoneRequestByEmployer']);
    Route::post('my-contact/done', ['as' => 'contactDoneRequestByFreelancer', 'uses' => 'MilestoneController@postContactDoneRequestByFreelancer']);
    Route::post('my-contact/done/employer', ['as' => 'contactDoneRequestByEmployer', 'uses' => 'MilestoneController@postContactDoneRequestByEmployer']);

});




Route::get('email/confirmation', ['as' => 'sendToken', 'uses' => 'RegistrationController@EmailToken']);
Route::get('email-confirmation-notification', ['as' => 'verifyEmail', 'uses' => 'RegistrationController@EmailConfirmation','middleware' => 'auth']);
Route::get('email-confirmation-success', ['as' => 'verifyEmailSuccess', 'uses' => 'RegistrationController@EmailConfirmationSuccess']);
Route::get('email-confirmation-fail', ['as' => 'verifyEmailFail', 'uses' => 'RegistrationController@EmailConfirmationFail']);







Route::group(['prefix' => 'freelancer','middleware' => ['auth', 'approve']], function (){
   Route::get('search', ['as' => 'freelancerSearch', 'uses' => 'FreelancerController@getFreelancerSearch','middleware' => 'employer']);
});


/*Exam Route for admin Start*/
Route::group(['prefix' => 'exam-admin','middleware' => ['admin', 'approve','profile']], function (){
    Route::get('add', ['as' => 'addExam', 'uses' => 'adminController\ExamController@ExamAdd']);
    Route::post('add/execute', ['as' => 'postAddExam', 'uses' => 'adminController\ExamController@PostAddExam']);
    Route::get('exam-list', ['as' => 'listExam', 'uses' => 'adminController\ExamController@ExamList']);

    Route::post('exam-list', ['as' => 'examUpdate', 'uses' => 'adminController\ExamController@PostExamUpdate']);
    Route::post('exam-delete', ['as' => 'examDelete', 'uses' => 'adminController\ExamController@PostExamDelete']);

    Route::get('add-question/{examID}', ['as' => 'addQuestion', 'uses' => 'adminController\ExamController@QuestionAdd']);

    Route::get('add-set', ['as' => 'addQuestionSet', 'uses' => 'adminController\ExamController@ExamQuestionSetAdd']);
    Route::post('post-set', ['as' => 'postQuestion', 'uses' => 'adminController\ExamController@ExamQuestionSet']);
    Route::post('answer-list', ['as' => 'answerList', 'uses' => 'adminController\ExamController@AnswerList']);
    Route::get('question-list/{examId}', ['as' => 'questionList', 'uses' => 'adminController\ExamController@QuestionList']);
    Route::post('update-question', ['as' => 'updateQuestion', 'uses' => 'adminController\ExamController@UpdateQuestion']);
    Route::post('delete-question', ['as' => 'deleteQuestion', 'uses' => 'adminController\ExamController@DeleteQuestion']);

    //route for question set start
    Route::get('add-set-question/{examId}', ['as' => 'addQuestionSet', 'uses' => 'adminController\ExamController@GetQuestionSet']);
    Route::post('add-set-question', ['as' => 'postAddset', 'uses' => 'adminController\ExamController@QuestionSetAdd']);
    Route::get('set-list/{examId}', ['as' => 'setList', 'uses' => 'adminController\ExamController@QuestionSetList']);
    Route::post('set-list/', ['as' => 'updateSet', 'uses' => 'adminController\ExamController@UpdateQuestionSet']);
    Route::post('set-delete', ['as' => 'setDelete', 'uses' => 'adminController\ExamController@DeleteQuestionSet']);
});
/*Exam Route for admin End*/

/*Exam Route for freelancer Start*/
Route::group(['prefix' => 'exam','middleware' => ['auth', 'approve','profile']], function (){
    Route::get('list', ['as' => 'ExamList', 'uses' => 'TestController@TestList']);
    Route::get('info/{examId}', ['as' => 'examInfo', 'uses' => 'TestController@TestInfo']);
    Route::get('exam-start/{examId}', ['as' => 'takeExam', 'uses' => 'TestController@ExamTake']);
    Route::post('exam-take/{examId}', ['as' => 'questionSubmit', 'uses' => 'TestController@PostExamTaken']);
    Route::get('exam-take/{examId}', ['as' => 'getExamDetails', 'uses' => 'TestController@GetExamTaken']);
    Route::get('test-result/', ['as' => 'getTestResult', 'uses' => 'TestController@GetTestResult']);

    Route::get('set-list/{examId}', ['as' => 'setList', 'uses' => 'TestController@GetSetList']);

});
/*Exam Route for freelancer End*/


// route for view/blade file
Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PayPalController@payWithPaypal'));
// route for post request
Route::post('paypal', array('as' => 'paypal','uses' => 'PayPalController@postPaymentWithpaypal'));
// route for check status responce
Route::get('paypal', array('as' => 'status','uses' => 'PayPalController@getPaymentStatus'));



Route::get('addmoney/stripe', array('as' => 'addmoney.paywithstripe','uses' => 'AddMoneyController@payWithStripe'));

Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'AddMoneyController@postPaymentWithStripe'));

Route::get('coming-soon', ['as' => 'comingSoon', 'uses' => 'HomeController@getComingSoonPage']);



/*Route for message*/

/*Message Route for user Start*/
Route::group(['prefix' => 'message','middleware' => ['auth', 'approve','profile']], function (){
    Route::get('/', ['as' => 'message', 'uses' => 'MessageController@Message']);
    Route::post('/send-message', ['as' => 'sendUserMessage', 'uses' => 'MessageController@MessageSend']);
    Route::post('/get-message/{conversionId}', ['as' => 'getUserMessage', 'uses' => 'MessageController@MessageGet']);
    Route::get('/get-message/{adminId}', ['as' => 'getMessage', 'uses' => 'MessageController@GetMessage']);
    Route::get('/conversion/{conversionId}', ['as' => 'getConversion', 'uses' => 'MessageController@GetConversionMessage']);

    Route::post('/send-attachment', ['as' => 'sendAttachmentUser', 'uses' => 'MessageController@SendAttachment']);
    Route::post('/attachment-download', ['as' => 'messageAttachmentDownload', 'uses' => 'MessageController@getAttachmentDownload']);
    Route::post('/message-status', ['as' => 'adminMessageStatus', 'uses' => 'MessageController@getAdminMessageStatus']);

});
/*Message Route for user End*/

/*Message Route for Admin Start*/
Route::group(['prefix' => 'admin-message','middleware' => ['auth', 'approve','admin']], function (){

    Route::get('/', ['as' => 'admin-message', 'uses' => 'adminController\AdminMessageController@UserList']);

    Route::get('admin-user-message/{userId}', ['as' => 'adminConversion', 'uses' => 'adminController\AdminMessageController@AdminConversion']);
    Route::get('admin-conversion/{conversionId}', ['as' => 'admin-getConversion', 'uses' => 'adminController\AdminMessageController@AdminMessageConversion']);
    Route::post('admin-send-message', ['as' => 'AdminSendUserMessage', 'uses' => 'adminController\AdminMessageController@AdminMessageSend']);
    Route::post('admin-message-send', ['as' => 'getAdminMessage', 'uses' => 'adminController\AdminMessageController@MessageAdminGet']);
    Route::post('/attachment-admin-download', ['as' => 'messageAttachmentAdminDownload', 'uses' => 'adminController\AdminMessageController@getAttachmentDownload']);
    Route::post('/send-attachment-admin', ['as' => 'sendAttachmentAdmin', 'uses' => 'adminController\AdminMessageController@MessageAdminAttachment']);

});
/*Message Route for Admin End*/

/*Notification Route for Admin Start*/
Route::group(['prefix' => 'notification','middleware' => ['auth', 'approve','admin']], function (){

    Route::post('admin-send-message', ['as' => 'AdminSendGetNotification', 'uses' => 'adminController\AdminMessageController@AdminGetNotification']);
    Route::post('admin-message-send', ['as' => 'getAdminMessage', 'uses' => 'adminController\AdminMessageController@MessageAdminGet']);


});
/*Notification Route for Admin End*/


/*Notification Route for User Start*/
Route::group(['prefix' => 'notification','middleware' => ['auth', 'approve']], function (){

    Route::post('user-get-notification', ['as' => 'GetNotification', 'uses' => 'MessageController@getNotification']);

});
/*Notification Route for User End*/

