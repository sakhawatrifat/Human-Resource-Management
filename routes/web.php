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

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('/designation','DesignationController');
Route::resource('/department','DepartmentController');
Route::resource('/employee','EmployeeController');
Route::resource('/award','AwardController');
Route::resource('/attendance','AttendanceController');
Route::resource('/holiday','HolidayController');
Route::resource('/notice','NoticeController');
Route::resource('/expense','ExpenseController');

// Ajax
Route::post('/holiday_data','AjaxController@holiday_list');