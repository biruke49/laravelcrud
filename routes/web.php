<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/admin', 'AdminController@index')->name('index')->middleware('auth');
Route::get('/admin/create', 'AdminController@create')->name('create')->middleware('auth');
Route::post('/admin', 'AdminController@store')->name('store')->middleware('auth');
Route::get('/admin/{id}', 'AdminController@show')->name('show')->middleware('auth');
Route::put('/admin/update/{id}','AdminController@update')->name('update')->middleware('auth');
Route::delete('/admin/{id}','AdminController@destroy')->name('destroy')->middleware('auth');
Route::post('/admin/status/{id}','AdminController@status')->name('status')->middleware('auth'); 
Route::get('/profileshow','AdminController@profileshow')->name('profileshow')->middleware('auth'); 
Route::get('/forgotpassword/{id}','AdminController@forgotpassword')->name('forgotpassword')->middleware('auth'); 
Route::post('/send/email/{id}','AdminController@mail')->name('mail')->middleware('auth'); 
Route::get('/resetpassword','AdminController@resetpassword')->name('resetpassword')->middleware('auth'); 
Route::post('/savenewpassword','AdminController@savenewpassword')->name('savenewpassword')->middleware('auth'); 

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
