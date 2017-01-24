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

//GET routes added

//Home page
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/reset', 'HomeController@index');
// User login
Route::get('/login','UserController@login');
// User register
Route::get('/register','UserController@register');
// after login/register
Route::get('/home','UserController@home');
// for logout
Route::get('/logout','UserController@logout');
// Student Profile
Route::get('/admin','UserController@admin');


// Teacher controller
Route::group(['namespace' => 'Teacher'], function() {
    Route::get('/update/{id}', [
        'uses' => 'TeacherController@openEvent'
    ]);
    Route::get('/update/{code}/{id}', [
        'uses' => 'TeacherController@updateProgram'
    ]);
    Route::get('/check/{id}', [
        'uses' => 'TeacherController@checkCode'
    ]);
    Route::get('/delete/{id}', [
        'uses' => 'TeacherController@delete'
    ]);
    Route::get('/event-details', [
        'uses' => 'TeacherController@eventDetails'
    ]);
    Route::get('/teacher/profile', [
        'uses' => 'TeacherController@profile'
    ]);
    Route::get('/new', [
        'uses' => 'TeacherController@createEvent'
    ]);
    Route::get('/create', [
        'uses' => 'TeacherController@programInput'
    ]);
    Route::post('/teacher_details/{id}', [
        'uses' => 'TeacherController@teacherDetails'
    ]);
    Route::post('/record', [
        'uses' => 'TeacherController@record'
    ]);
    Route::post('/program', [
        'uses' => 'TeacherController@programDetails'
    ]);
    Route::post('/programUpdate', [
        'uses' => 'TeacherController@programUpdateDone'
    ]);
    Route::post('{id}/event-details', [
        'uses' => 'TeacherController@eventSave'
    ]);

});

Route::group( ['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('update/{code}', [
        'uses' => 'AdminController@openEvent'
    ]);
    Route::get('update/{code}/{id}', [
        'uses' => 'AdminController@updateProgram'
    ]);
    Route::get('check/{id}', [
        'uses' => 'AdminController@checkCode'
    ]);
    Route::get('delete/{id}', [
        'uses' => 'AdminController@delete'
    ]);
    Route::get('event-details', [
        'uses' => 'AdminController@eventDetails'
    ]);
    Route::get('new', [
        'uses' => 'AdminController@createEvent'
    ]);
    Route::get('create', [
        'uses' => 'AdminController@programInput'
    ]);
    Route::post('record', [
        'uses' => 'AdminController@record'
    ]);
    Route::post('program', [
        'uses' => 'AdminController@programDetails'
    ]);
    Route::post('programUpdate', [
        'uses' => 'AdminController@programUpdateDone'
    ]);
    Route::post('{id}/event-details', [
        'uses' => 'AdminController@eventSave'
    ]);
    Route::get('contest/{code}/{id}', [
        'uses' => 'AdminController@play'
    ]);
    Route::get('contest/{id}', [
        'uses' => 'AdminController@contest'
    ]);
    Route::get('Admin', [
        'uses' => 'AdminController@addAdmin'
    ]);
    Route::get('Admin/Show', [
        'uses' => 'AdminController@showAdmin'
    ]);
    Route::post('Admin', [
        'uses' => 'AdminController@addAdmindata'
    ]);
    Route::get('Admin/{id}', [
        'uses' => 'AdminController@editAdmin'
    ]);
    Route::post('Admin/edit/{id}', [
        'uses' => 'AdminController@updateAdmin'
    ]);
    Route::get('Student', [
        'uses' => 'AdminController@addStudent'
    ]);
    Route::get('Student/Show', [
        'uses' => 'AdminController@showStudent'
    ]);
    Route::post('Student', [
        'uses' => 'AdminController@addStudentdata'
    ]);
    Route::get('Student/{id}', [
        'uses' => 'AdminController@editStudent'
    ]);
    // Route::delete('Student/{id}', [
    //     'uses' => 'AdminController@editStudent'
    // ]);
    Route::delete('Student/{id}', function() {
        return "Helo";
    });
    Route::post('Student/edit/{id}', [
        'uses' => 'AdminController@updateStudent'
    ]);

    Route::get('Teacher', [
        'uses' => 'AdminController@addTeacher'
    ]);
    Route::get('Teacher/Show', [
        'uses' => 'AdminController@showTeacher'
    ]);
    Route::post('Teacher', [
        'uses' => 'AdminController@addTeacherdata'
    ]);
    Route::get('Teacher/{id}', [
        'uses' => 'AdminController@editTeacher'
    ]);
    // Route::delete('Teacher/{id}', [
    //     'uses' => 'AdminController@editTeacher'
    // ]);
    Route::delete('Teacher/{id}', function() {
        return "Helo";
    });
    Route::post('Teacher/edit/{id}', [
        'uses' => 'AdminController@updateTeacher'
    ]);

});

Route::group(['namespace' => 'Student'], function() {
    Route::get('/student/profile', [
        'uses' => 'StudentController@profile'
    ]);
    Route::post('/student_details/{id}', [
        'uses' => 'StudentController@studentDetails'
    ]);
    Route::get('/contest/{code}/{id}', [
        'uses' => 'StudentController@play'
    ]);
    Route::get('/contest/{id}', [
        'uses' => 'StudentController@contest'
    ]);
    Route::get('/event/register/{code}', [
        'uses' => 'StudentController@eventRegister'
    ]);
});

Route::post('/compile/{code}/{id}','ProgramController@compile');

Route::post('/runcode/{code}/{id}','ProgramController@runstatus');

Route::get('/leaderboard/{code}','ProgramController@leaderboard');





Route::get('/write','ProgramController@writeFile');
//Error
Route::get('/error',function(){
    return view('errors.503');
});
Route::get('/{id}',function() {
	return view('errors.503');
});





// POST routes added
Route::post('/admin_login','UserController@adminLogin');
Route::post('/student_login','UserController@studentLogin');	// Check Student login details

Route::post('/student_register','UserController@studentRegister');	// Check and save student registration

Route::post('/teacher_login','UserController@teacherLogin');	// Check Teacher login details

Route::post('/teacher_register','UserController@teacherRegister');	// Check and save Teacher registration

Route::post('/check','ProgramController@snippet');



