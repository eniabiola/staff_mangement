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
Route::match(['get', 'post'], '/disable/staff', ['uses' => 'StaffManagementController@disablestaff']);
Route::match(['get', 'post'], '/search/staff', ['uses' => 'StaffManagementController@searchstaff']);
Route::match(['get', 'post'], '/enable/staff', ['uses' => 'StaffManagementController@enablestaff']);
Route::resource('/staffmanagement', 'StaffManagementController');
