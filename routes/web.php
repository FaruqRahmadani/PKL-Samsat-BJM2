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

// Route Untuk User
Route::group(['middleware' => 'User'], function(){
  Route::get('/dashboard', 'UserController@Dashboard');
  Route::get('/golongan-kendaraan', 'UserController@DataGolonganKendaraan');
  Route::get('/tambah-golongan-kendaraan', 'UserController@TambahGolonganKendaraan');
  Route::POST('/tambah-golongan-kendaraan', 'UserController@storeTambahGolonganKendaraan');
  Route::get('/golongan-kendaraan/{id}/edit', 'UserController@EditGolonganKendaraan');
  Route::POST('/golongan-kendaraan/{id}/edit', 'UserController@storeEditGolonganKendaraan');
  Route::get('/golongan-kendaraan/{id}/hapus', 'UserController@HapusGolonganKendaraan');


});

// Route Logout
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// TESTING AJA
Route::get('/testing', 'UserController@Dashboard');
Route::get('/testing/tipe', 'UserController@TipeKendaraan');
Route::get('/testing/tipe/{id}/tipes.json', 'UserController@Tipe');


Route::get('/home', 'HomeController@index')->name('home');
