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

Auth::routes();

// Route Untuk Halaman Depan
Route::get('/', 'DepanController@Index');
Route::get('/informasi', 'DepanController@Informasi');

// TESTING AJA
Route::get('/testing', 'UserController@Dashboard');
Route::get('/testing/tipe', 'UserController@TipeKendaraan');
Route::get('/testing/tipe/{id}/tipes.json', 'UserController@Tipe');


Route::get('/home', 'HomeController@index')->name('home');
