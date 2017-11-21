<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Crypt;
use App\MerkKendaraan;
use App\TipeKendaraan;
use App\User;
use App\Golongan;

class UserController extends Controller
{
  public function Dashboard()
  {
    return view('User.Dashboard');
  }

  public function DataGolonganKendaraan()
  {
    $Golongan = Golongan::all();
    return view('User.DataGolonganKendaraan', ['Golongan' => $Golongan]);
  }

  public function TambahGolonganKendaraan()
  {
    return view('User.TambahGolonganKendaraan');
  }

  public function storeTambahGolonganKendaraan(Request $request)
  {
    $Golongan            = new Golongan;
    $Golongan->golongan  = $request->NamaGolongan;
    $Golongan->biaya_sw  = $request->SantunanWajib;
    $Golongan->biaya_adm = $request->BiayaAdmin;
    $Golongan->save();

    return redirect('/golongan-kendaraan')->with('success', 'Data Golongan '.$request->NamaGolongan.' Berhasil di Tambahkan');
  }

  public function EditGolonganKendaraan($id)
  {
    $ids      = Crypt::decryptString($id);
    $Golongan = Golongan::find($ids);

    return view('User.EditGolonganKendaraan', ['Golongan' => $Golongan]);
  }

  public function storeEditGolonganKendaraan(Request $request, $id)
  {
    $ids      = Crypt::decryptString($id);
    $Golongan = Golongan::find($ids);

    $Golongan->golongan  = $request->NamaGolongan;
    $Golongan->biaya_sw  = $request->SantunanWajib;
    $Golongan->biaya_adm = $request->BiayaAdmin;
    $Golongan->save();

    return redirect('/golongan-kendaraan')->with('success', 'Data Golongan '.$Golongan->golongan.' Berhasil di Ubah');
  }

  public function HapusGolonganKendaraan($id)
  {
    $ids      = Crypt::decryptString($id);
    $Golongan = Golongan::find($ids);

    // Nama Golongan
    $NamaGolongan = $Golongan->golongan;

    $Golongan->delete();

    return redirect('/golongan-kendaraan')->with('success', 'Data Golongan '.$NamaGolongan.' Berhasil di Hapus');
  }

  // Coba Coba Ini
  public function Tipe($id)
  {
    $Tipe = TipeKendaraan::where('merkkendaraans_id', $id)->get();
    return $Tipe;
  }
}
