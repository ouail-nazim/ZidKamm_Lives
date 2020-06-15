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

Route::get('/', 'UserController@index');
Route::get('/sherchUser','UserController@sherchUser' )->name('sherch_user');
Route::get('/about', 'UserController@about')->name('about');
Route::get('/contact', 'UserController@contact')->name('contact');

Route::post('/contactUS', 'UserController@contactUS')->name('contactUS');
//Auth::routes();
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@dashboard')->name('home');
Route::get('/allLives', 'HomeController@allLives')->name('allLives');
Route::get('/AddLive', 'HomeController@addLive')->name('AddLive');
Route::post('/saveLive','LiveController@saveLive')->name('saveLive');
Route::get('/deletLive/{id}', 'LiveController@deletLive')->name('deletLive');
Route::get('/sherch', 'LiveController@sherch')->name('sherch');
Route::get('/mesMessage', 'HomeController@mesMessage')->name('mesMessage');
Route::get('/see', 'HomeController@seeMessage')->name('see');
Route::get('/deleteMessage/{id}', 'HomeController@deleteMessage')->name('deleteMessage');
//Route::get('/sendemail/{email}/{name}', 'HomeController@sendemail')->name('sendemail');


