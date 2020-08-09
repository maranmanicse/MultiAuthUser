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
Route::get('/user/profile/{id}', 'HomeController@show')->name('user.profile');
Route::get('/user/profileDetail/{id}', 'HomeController@edit')->name('user.profileDetail');
Route::post('/user-update/{id}', 'HomeController@update')->name('user.update');
Route::get('/admin-home', 'AdminController@index')->name('admin.home');
Route::get('/changeStatus/User/{id}', 'AdminController@changeStatus')->name('admin.changeUserStatus');
