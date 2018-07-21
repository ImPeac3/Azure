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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/createschedule', 'ScheduleController@index')->name('createschedule');
Route::post('/createschedule','ScheduleController@createschedule')->name('createschedule');

Route::get('/addagent','RegisterController@addagentform')->name('addagent');
Route::post('/addagent','RegisterController@addagent')->name('addagent');

Route::get('/viewbooking','ScheduleController@viewbookig')->name('viewbooking');
Route::post('/viewbooking','ScheduleController@searchbooking')->name('viewbooking');

Route::get('/viewagent','AgentController@viewagent')->name('viewagent');
Route::post('/viewagent','AgentController@searchagent')->name('viewagent');

Route::get('/addcustomer','RegisterController@addcustomerform')->name('addcustomer');
Route::post('/addcustomer','RegisterController@addcustomer')->name('addcustomer');

Route::get('/registeritem','ProfileController@searchprofile')->name('registeritem');
Route::post('/registeritem','ProfileController@updateprofile')->name('registeritem');

Route::get('/bookvessel','ScheduleController@viewvessel')->name('bookvessel');
Route::post('/bookvessel','ScheduleController@searchvessel')->name('bookvessel');

Route::get('/additem','ScheduleController@createbooking')->name('additem');
Route::post('/additem','ScheduleController@savebooking')->name('additem');

Route::get('/viewbooking','ScheduleController@viewbookings')->name('viewbooking');

Route::get('/viewslot','ScheduleController@viewslots')->name('viewslot');

Route::get('/editprofile','ProfileController@searchprofile')->name('myprofile');
Route::post('/editprofile','ProfileController@updateprofile')->name('myprofile');


