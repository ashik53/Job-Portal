<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//------------------Universal pages-------
Route::get('/', 'WelcomeController@showPage');
//contact page
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('contact');
});
//--------------------Admin------------
//dashboard
Route::get('/dashboard', 'UserController@seeDashboard');/*function () {
    return view('admin.dashboard');
});*/
/*-------------Profile------------------- */
Route::resource('profiles', 'ProfileController' );
//delete a profile by get request
Route::get('/delete-user/{user_id}', 'UserController@deleteUser');
Route::get('/denote-to-student/{user_id}', 'UserController@denoteToStudent');
Route::get('update-profile', function () {
    return view('profile.profile_update');
});
//-------------notifications------------

Route::get('notifications', function () {
    return view('notification.notifications_all');
});

//------------student and alumni list (stackholders)-----------

Route::resource('stackholders', 'StackholderController');
//show all alumni and students
Route::get('show-all/{key}', 'StackholderController@index'); // key = 2 = alumni , 3 = students 

//------------ Alumni controller----------------
Route::get('get-form', 'AlumniController@showAlumniForm');
Route::get('apply-for-alumni', 'AlumniController@applyForAlumni');
//Show all requests
Route::get('show-reqs','AlumniController@showAlumniRequests');
//accept an student as an alumni
Route::get('accept-req/{user_id}', 'AlumniController@acceptAlumniRequest');


Route::get('delete-req/{user_id}','AlumniController@deleteAlumniRequest');
Route::get('student-list', function () {
    return view('student.student_list');
});

//-----------------------------Jobs ----------------

Route::resource('jobs', 'JobController');
//see all applied jobs of myself
Route::get('/applied-jobs', 'JobController@myAppliedJobs');
//see all posted jobs by myself
Route::get('/posted-jobs', 'JobController@myPostedJobs');
//see all jobs by keyword searching
Route::get('view-all-jobs', function () {
    return view('job.all_jobs');
});

Route::get('add-a-job', function () {
    return view('job.add_jobs');
});
Route::get('view-a-job', function () {
    return view('job.individual_job_post');
});


//add a comment to a job
Route::post('/add-comment/{job_id}', 'CommentController@addComment');
//-----------------------------Application (Job Application)-----------
//apply for a job
Route::get('/apply/{job_id}/{user_id}', 'ApplicationController@applyJob'); 
//cancel job application
Route::get('/cancel-apply/{job_id}/{user_id}', 'ApplicationController@cancelJobApplication'); 
//show all applications for a job
Route::get('/applications/{job_id}','ApplicationController@showAllApplications');
//accept a job application for interview
Route::get('/accept-interview-req/{job_id}/{user_id}', 'ApplicationController@acceptInterviewRequest');
//delete a job application for interview
Route::get('/delete-interview-req/{job_id}/{user_id}', 'ApplicationController@deleteInterviewRequest');
//show all interview calls of a job
Route::get('/all-interview-calls/{job_id}', 'ApplicationController@allJobInterviewCalls');
//show all interview calls of a student
Route::get('/show-interview-calls', 'ApplicationController@showInterviewCalls');

//------------------------------Notification--------------------

Route::resource('alerts', 'AlertController');


Route::get('view-all-notifications', function () {
    return view('notification.notifications_all');
});
//------------------Password reset-------------------
Route::get('/password-reset', 'UserController@showPage');
Route::post('/change-password', 'UserController@changePassword');
//------------------chats-------------------

//post a message
Route::get('/chats/{receiver_id}', 'ChatController@store');
//go to chat page
Route::get('/view-chats/{user_id}', 'ChatController@viewAllChats');
//check inbox
Route::get('/inbox', 'ChatController@viewMyInbox');

//-------------------------miscellaneous-----------
Route::get('/search-keyword', 'UserController@searchByKeyword');



Route::get('student/view-a-job', function () {
    return view('alumni.individual_job_post');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('view-mail', function(){

    return view('mail.approved_alumni_request');

});