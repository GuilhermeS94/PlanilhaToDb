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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dbm', 'HomeController@dbm')->name('dbm');
Route::get('/facebook', 'HomeController@facebook')->name('facebook');
Route::get('/oticas', 'HomeController@oticas')->name('oticas');
Route::get('/youtube', 'HomeController@youtube')->name('youtube');
