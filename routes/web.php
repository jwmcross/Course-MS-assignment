<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

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
use Illuminate\Support\Facades\Mail;
Route::get('/email', function(){
    return new \App\Mail\UserCreatedMail();
});

//Protected Routes - That can only be accessed when the user is logged in.
Route::group(['middleware'=>'auth'], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/staff/assign','StaffController@assignStaff')->name('assign_staff_table');
    Route::get('/staff/assign/module/{staff}', 'StaffController@assignModuleTable')->name('staff.assign_module');
    Route::post('/staff/assign/module/{staff}', 'StaffController@assignModule')->name('staff.save_assign_module');
    Route::get('/staff/assign/course/{staff}', 'StaffController@assignCourseTable')->name('staff.assign_course');
    Route::post('/staff/assign/course/{staff}', 'StaffController@assignCourse')->name('staff.save_assign_course');

    Route::get('/staff', 'StaffController@index')->name('show_staff');
    Route::get('/staff/create', 'StaffController@create')->name('new_staff');
    Route::post('/staff/create', 'StaffController@store')->name('create_staff');
    Route::get('/staff/{staff}', 'StaffController@show')->name('view_staff');
    Route::get('/staff/edit/{staff}', 'StaffController@edit')->name('modify_staff');
    Route::patch('/staff/edit/{staff}', 'StaffController@update')->name('update_staff');
    Route::delete('/staff/delete/{staff}', 'StaffController@destroy')->name('delete_staff');

    Route::get('/staff/archive', 'StaffController@archive')->name('archive.show_staff');

    Route::get('/student', 'StudentController@index')->name('show_student');
    Route::get('/student/create', 'StudentController@create')->name('new_student');
    Route::get('/student/manage','StudentController@manage')->name('student.manage_student');
    Route::post('/student', 'StudentController@store')->name('create_student');
    Route::get('/student/{student}', 'StudentController@show')->name('view_student');
    Route::get('/student/edit/{student}', 'StudentController@edit')->name('modify_student');
    Route::patch('/student/edit/{student}', 'StudentController@update')->name('update_student');
    Route::delete('/student/delete/{student}', 'StudentController@destroy')->name('delete_student');

    Route::post('/student/archive/{student_id}', 'StudentController@archive')->name('student.archive_student');


    Route::get('/course/archive', 'CourseController@archivee')->name('archive.show_course');
    Route::post('/course/archive/{course}', 'CourseController@archiveCourse')->name('archive.archive_course');

    Route::get('/course/structure', 'CourseController@structureCourseView')->name('course.structure_table');

    Route::get('/course', 'CourseController@index')->name('show_course');
    Route::get('/course/create', 'CourseController@create')->name('new_course');
    Route::post('/course', 'CourseController@store')->name('create_course');
    Route::get('/course/{course}', 'CourseController@show')->name('view_course');
    Route::get('/course/edit/{course}', 'CourseController@edit')->name('modify_course');
    Route::patch('/course/edit/{course}', 'CourseController@update')->name('update_course');
    Route::delete('/course/delete/{course}', 'CourseController@destroy')->name('delete_course');


    Route::get('/course/structure/{course}', 'CourseController@structureCourse')->name('course.structure_course');
    Route::POST('/course/structure/{course}', 'CourseController@saveStructureCourse')->name('course.structure_course');
    Route::get('/course/archive', 'CourseController@archivee')->name('archive.show_course');
    Route::post('/course/archive/{course}', 'CourseController@archiveCourse')->name('archive.archive_course');

    Route::get('/module', 'ModuleController@index')->name('show_module');
    Route::get('/module/create', 'ModuleController@create')->name('new_module');
    Route::post('/module', 'ModuleController@store')->name('create_module');
    Route::get('/module/{module}', 'ModuleController@show')->name('view_module');
    Route::get('/module/edit/{module}', 'ModuleController@edit')->name('modify_module');
    Route::patch('/module/edit/{module}', 'ModuleController@update')->name('update_module');
    Route::delete('/module/delete/{module}', 'ModuleController@destroy')->name('delete_module');

    Route::get('/profile','Admin\UserController@showProfile')->name('show_profile');

});

Route::get('/','HomeController@index')->middleware('auth');

Auth::routes();
Auth::routes(['register'=>false]);



Route::namespace('Admin')->prefix('admin')->name('admin.')
    ->middleware('can:manage-users')
    ->group(function(){
        Route::get('/users/staff','UserController@showNonUsers')->name('users.showNonUsers');
        Route::patch('/users/reset_password','UserController@resetPassword')->name('users.reset_password');
        Route::get('/users/create', 'UserController@create')->name('users.new__user');
        Route::post('/users/create', 'UserController@store')->name('users.create_user');
        Route::get('/users/create/{staff}', 'UserController@createStaff')->name('users.new_staff_user');
        Route::post('/users/create/{staff}', 'UserController@store')->name('users.create_staff_user');
        Route::resource('/users','UserController');
});

