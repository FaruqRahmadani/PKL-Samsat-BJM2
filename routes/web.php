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
Route::POST('/info-pajak', 'DepanController@InfoPajak');
Route::get('/bayar/tahunan/{noplat}/{PKB}/{SWDKLJJ}', 'DepanController@FormBayarPajak');
Route::POST('/bayar/tahunan/{noplat}/{PKB}/{SWDKLJJ}', 'DepanController@submitFormBayarPajak');
Route::POST('/cek-status', 'DepanController@CekStatus');
Route::get('/informasi', 'DepanController@Informasi');

// Route Untuk User
Route::group(['middleware' => 'User'], function(){
  Route::get('/dashboard', 'UserController@Dashboard');

  // Golongan Kendaraan
  Route::get('/golongan-kendaraan', 'UserController@DataGolonganKendaraan');
  Route::get('/golongan-kendaraan/tambah', 'UserController@TambahGolonganKendaraan');
  Route::POST('/golongan-kendaraan/tambah', 'UserController@storeTambahGolonganKendaraan');
  Route::get('/golongan-kendaraan/{id}/edit', 'UserController@EditGolonganKendaraan');
  Route::POST('/golongan-kendaraan/{id}/edit', 'UserController@storeEditGolonganKendaraan');
  Route::get('/golongan-kendaraan/{id}/hapus', 'UserController@HapusGolonganKendaraan');

  // Merk Kendaraan
  Route::get('/merk-kendaraan', 'UserController@DataMerkKendaraan');
  Route::get('/merk-kendaraan/tambah', 'UserController@TambahMerkKendaraan');
  Route::POST('/merk-kendaraan/tambah', 'UserController@storeTambahMerkKendaraan');
  Route::get('/merk-kendaraan/{id}/edit', 'UserController@EditMerkKendaraan');
  Route::POST('/merk-kendaraan/{id}/edit', 'UserController@storeEditMerkKendaraan');
  Route::get('/merk-kendaraan/{id}/hapus', 'UserController@HapusMerkKendaraan');

  // Tipe Kendaraan
  Route::get('/tipe-kendaraan', 'UserController@DataTipeKendaraan');
  Route::get('/tipe-kendaraan/tambah', 'UserController@TambahTipeKendaraan');
  Route::POST('/tipe-kendaraan/tambah', 'UserController@storeTambahTipeKendaraan');
  Route::get('/tipe-kendaraan/{id}/edit', 'UserController@EditTipeKendaraan');
  Route::POST('/tipe-kendaraan/{id}/edit', 'UserController@storeEditTipeKendaraan');
  Route::get('/tipe-kendaraan/{id}/hapus', 'UserController@HapusTipeKendaraan');

  // Jenis TNKB
  Route::get('/jenis-tnkb', 'UserController@DataTNKB');
  Route::get('/jenis-tnkb/tambah', 'UserController@TambahTNKB');
  Route::POST('/jenis-tnkb/tambah', 'UserController@storeTambahTNKB');
  Route::get('/jenis-tnkb/{id}/edit', 'UserController@EditTNKB');
  Route::POST('/jenis-tnkb/{id}/edit', 'UserController@storeEditTNKB');
  Route::get('/jenis-tnkb/{id}/hapus', 'UserController@HapusTNKB');

  // Data User
  Route::get('/user', 'UserController@DataUser');
  Route::get('/user/tambah', 'UserController@TambahUser');
  Route::POST('/user/tambah', 'UserController@storeTambahUser');
  Route::get('/user/{id}/edit', 'UserController@EditUser');
  Route::POST('/user/{id}/edit', 'UserController@storeEditUser');

  // Data NJKB
  Route::get('/njkb-kendaraan', 'UserController@DataNJKB');
  Route::get('/njkb-kendaraan/tambah', 'UserController@TambahNJKB');
  Route::POST('/njkb-kendaraan/tambah', 'UserController@storeTambahNJKB');
  Route::get('/njkb-kendaraan/{id}/edit', 'UserController@EditNJKB');
  Route::POST('/njkb-kendaraan/{id}/edit', 'UserController@storeEditNJKB');

  // Daerah SAMSAT
  Route::get('/daerah-uppd', 'UserController@DataDaerahUPPD');
  Route::get('/daerah-uppd/tambah', 'UserController@TambahDaerahUPPD');
  Route::POST('/daerah-uppd/tambah', 'UserController@storeTambahDaerahUPPD');
  Route::get('/daerah-uppd/{id}/edit', 'UserController@EditDaerahUPPD');
  Route::POST('/daerah-uppd/{id}/edit', 'UserController@storeEditDaerahUPPD');
  Route::get('/daerah-uppd/{id}/hapus', 'UserController@HapusDaerahUPPD');

  // Data kendaraan
  Route::get('/kendaraan', 'UserController@DataKendaraan');
  Route::get('/kendaraan/{noplat}/detail', 'UserController@SingleDataKendaraan');
  Route::get('/kendaraan/tambah', 'UserController@TambahKendaraan');
  Route::POST('/kendaraan/tambah', 'UserController@storeTambahKendaraan');
  Route::get('/kendaraan/{id}/edit', 'UserController@UbahKendaraan');
  Route::POST('/kendaraan/{id}/edit', 'UserController@storeUbahKendaraan');

  // Data Pelayanan
  Route::get('/pelayanan', 'UserController@DataPelayanan');
  Route::get('/pelayanan/{id}', 'UserController@SingleDataPelayanan');
  Route::POST('/pelayanan/{id}', 'UserController@submitSingleDataPelayanan');

  // Laporan
  Route::get('/laporan-pendapatan-pkb', 'UserController@LaporanPendapatanPKB');
  Route::POST('/laporan-pendapatan-pkb', 'UserController@LaporanPendapatanPKBFilter');
  Route::get('/laporan-pendapatan-pkb/print', 'UserController@PrintLaporanPendapatanPKB');
  Route::get('/laporan-pendapatan-pkb/{TanggalAwal}/{TanggalAkhir}/print', 'UserController@PrintLaporanPendapatanPKBFilter');
  Route::get('/laporan-pendapatan-swdkljj', 'UserController@LaporanPendapatanSWDKLJJ');
  Route::POST('/laporan-pendapatan-swdkljj', 'UserController@LaporanPendapatanSWDKLJJFilter');
  Route::get('/laporan-pendapatan-swdkljj/print', 'UserController@PrintLaporanPendapatanSWDKLJJ');
  Route::get('/laporan-pendapatan-swdkljj/{TanggalAwal}/{TanggalAkhir}/print', 'UserController@PrintLaporanPendapatanSWDKLJJFilter');
  Route::get('/laporan-kendaraan-pajak-mati', 'UserController@LaporanKendaraanPajakMati');
  Route::POST('/laporan-kendaraan-pajak-mati', 'UserController@LaporanKendaraanPajakMatiFilter');
  Route::get('/laporan-kendaraan-pajak-mati/print', 'UserController@PrintLaporanKendaraanPajakMati');
  Route::get('/laporan-kendaraan-pajak-mati/{TanggalAwal}/{TanggalAkhir}/print', 'UserController@PrintLaporanKendaraanPajakMatiFilter');
  Route::get('/laporan-kendaraan-bayar-pajak', 'UserController@LaporanKendaraanBayarPajak');
  Route::get('/laporan-registrasi-batal', 'UserController@LaporanRegistrasiBatal');
  Route::POST('/laporan-registrasi-batal', 'UserController@LaporanRegistrasiBatalFilter');
  Route::get('/laporan-registrasi-batal/print', 'UserController@PrintLaporanRegistrasiBatal');
  Route::get('/laporan-registrasi-batal/{TanggalAwal}/{TanggalAkhir}/print', 'UserController@PrintLaporanRegistrasiBatalFilter');




  // Info Kendaraan ?????????????????????????????
  Route::get('/info-kendaraan', 'UserController@InfoKendaraan');
  Route::POST('/info-kendaraan', 'UserController@submitInfoKendaraan');


  // Untuk Json Tipe
  Route::get('/json-tipe/tipe/{id}/tipes.json', 'UserController@Tipe');
  Route::get('/json-tipe/tipe/{idMerk}/{idGol}/tipes.json', 'UserController@TipeGolongan');
  Route::get('/json-tahunbuat/tahunbuat/{idMerk}/{idTipe}/tipes.json', 'UserController@TahunBuat');

});

// Route Logout
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//PASSWORD
Route::get('/password', 'UserController@password');


// TESTING AJA
Route::get('/testing/tipe', 'UserController@TipeKendaraan');


Route::get('/home', 'HomeController@index')->name('home');
