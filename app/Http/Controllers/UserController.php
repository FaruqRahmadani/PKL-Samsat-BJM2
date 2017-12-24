<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Auth;
use File;
use Crypt;
use Carbon\Carbon;
use App\User;
use App\Njkb;
use App\Golongan;
use App\Transaksi;
use App\Kendaraan;
use App\JenisTnkb;
use App\DaerahSamsat;
use App\MerkKendaraan;
use App\TipeKendaraan;

class UserController extends Controller
{
  public function Dashboard()
  {
    return view('User.Dashboard');
  }

  public function DataGolonganKendaraan()
  {
    $Golongan = Golongan::with('TipeKendaraan')
                        ->get();

    return view('User.DataGolonganKendaraan', ['Golongan' => $Golongan]);
  }

  public function TambahGolonganKendaraan()
  {
    return view('User.TambahGolonganKendaraan');
  }

  public function storeTambahGolonganKendaraan(Request $request)
  {
    $Golongan             = new Golongan;
    $Golongan->golongan   = $request->NamaGolongan;
    $Golongan->keterangan = $request->Keterangan;
    $Golongan->biaya_sw   = $request->SantunanWajib;
    $Golongan->biaya_adm  = $request->BiayaAdmin;
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

    $Golongan->golongan   = $request->NamaGolongan;
    $Golongan->keterangan = $request->Keterangan;
    $Golongan->biaya_sw   = $request->SantunanWajib;
    $Golongan->biaya_adm  = $request->BiayaAdmin;
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

  public function DataMerkKendaraan()
  {
    $MerkKendaraan = MerkKendaraan::with('TipeKendaraan')
                                  ->get();

    return view('User.DataMerkKendaraan', ['MerkKendaraan' => $MerkKendaraan]);
  }

  public function TambahMerkKendaraan()
  {
    return view('User.TambahMerkKendaraan');
  }

  public function storeTambahMerkKendaraan(Request $request)
  {
    $MerkKendaraan = new MerkKendaraan;

    $MerkKendaraan->merk = $request->NamaMerk;
    $MerkKendaraan->save();

    return redirect('/merk-kendaraan')->with('success', 'Data Merk '.$request->NamaMerk.' Berhasil di Tambahkan');
  }

  public function EditMerkKendaraan($id)
  {
    $ids           = Crypt::decryptString($id);
    $MerkKendaraan = MerkKendaraan::find($ids);

    return view('User.EditMerkKendaraan', ['MerkKendaraan' => $MerkKendaraan]);
  }

  public function storeEditMerkKendaraan(Request $request, $id)
  {
    $ids           = Crypt::decryptString($id);
    $MerkKendaraan = MerkKendaraan::find($ids);

    $MerkKendaraan->merk = $request->NamaMerk;
    $MerkKendaraan->save();

    return redirect('/merk-kendaraan')->with('success', 'Data Merk '.$request->NamaMerk.' Berhasil di Ubah');
  }

  public function HapusMerkKendaraan($id)
  {
    $ids           = Crypt::decryptString($id);
    $MerkKendaraan = MerkKendaraan::find($ids);

    $NamaMerk      = $MerkKendaraan->merk;

    $MerkKendaraan->delete();

    return redirect('/merk-kendaraan')->with('success', 'Data Merk '.$NamaMerk.' Berhasil di Hapus');
  }

  public function DataTipeKendaraan()
  {
    $TipeKendaraan = TipeKendaraan::with('Golongan')
                                  ->with('MerkKendaraan')
                                  ->get();

    return view('User.DataTipeKendaraan', ['TipeKendaraan' => $TipeKendaraan]);
  }

  public function TambahTipeKendaraan()
  {
    $MerkKendaraan = MerkKendaraan::all();
    $Golongan      = Golongan::all();

    return view('User.TambahTipeKendaraan', ['MerkKendaraan' => $MerkKendaraan, 'Golongan' => $Golongan]);
  }

  public function storeTambahTipeKendaraan(Request $request)
  {
    $TipeKendaraan = new TipeKendaraan;

    $TipeKendaraan->merk_kendaraan_id = $request->idMerkKendaraan;
    $TipeKendaraan->golongan_id       = $request->idGolongan;
    $TipeKendaraan->tipe              = $request->NamaTipe;

    $TipeKendaraan->save();

    return redirect('/tipe-kendaraan')->with('success', 'Data Tipe Kendaraan '.$request->NamaTipe.' Berhasil di Tambahkan');
  }

  public function EditTipeKendaraan($id)
  {
    $ids           = Crypt::decryptString($id);
    $TipeKendaraan = TipeKendaraan::find($ids);

    $MerkKendaraan = MerkKendaraan::all();
    $Golongan      = Golongan::all();

    return view('User.EditTipeKendaraan', ['TipeKendaraan' => $TipeKendaraan, 'MerkKendaraan' => $MerkKendaraan, 'Golongan' => $Golongan]);
  }

  public function storeEditTipeKendaraan(Request $request, $id)
  {
    $ids           = Crypt::decryptString($id);
    $TipeKendaraan = TipeKendaraan::find($ids);

    $NamaTipe      = $TipeKendaraan->tipe;

    $TipeKendaraan->merk_kendaraan_id = $request->idMerkKendaraan;
    $TipeKendaraan->golongan_id       = $request->idGolongan;
    $TipeKendaraan->tipe              = $request->NamaTipe;

    $TipeKendaraan->save();

    return redirect('/tipe-kendaraan')->with('success', 'Data Tipe Kendaraan '.$NamaTipe.' Berhasil di Ubah');
  }

  public function HapusTipeKendaraan($id)
  {
    $ids           = Crypt::decryptString($id);
    $TipeKendaraan = TipeKendaraan::find($ids);

    $NamaTipe      = $TipeKendaraan->tipe;

    $TipeKendaraan->delete();

    return redirect('/tipe-kendaraan')->with('success', 'Data Tipe Kendaraan '.$NamaTipe.' Berhasil di Hapus');
  }

  public function DataTNKB()
  {
    $JenisTNKB = JenisTNKB::all();

    return view('User.DataTNKB', ['JenisTNKB' => $JenisTNKB]);
  }

  public function TambahTNKB()
  {
    return view('User.TambahTNKB');
  }

  public function storeTambahTNKB(Request $request)
  {
    $JenisTNKB = new JenisTNKB;

    $JenisTNKB->jenis_tnkb = $request->JenisTNKB;
    $JenisTNKB->bobot      = $request->Bobot;
    $JenisTNKB->save();

    return redirect('/jenis-tnkb')->with('success', 'Data TNKB '.$request->JenisTNKB.' Berhasil di Tambahakan');
  }

  public function EditTNKB($id)
  {
    $ids       = Crypt::decryptString($id);
    $JenisTNKB = JenisTNKB::find($ids);

    return view('User.EditTNKB', ['JenisTNKB' => $JenisTNKB]);
  }

  public function storeEditTNKB(Request $request, $id)
  {
    $ids       = Crypt::decryptString($id);
    $JenisTNKB = JenisTNKB::find($ids);

    $JenisTNKB->jenis_tnkb = $request->JenisTNKB;
    $JenisTNKB->bobot      = $request->Bobot;

    $JenisTNKB->save();

    return redirect('/jenis-tnkb')->with('success', 'Data TNKB '.$request->JenisTNKB.' Berhasil di Ubah');
  }

  public function HapusTNKB($id)
  {
    $ids       = Crypt::decryptString($id);
    $JenisTNKB = JenisTNKB::find($ids);

    $NamaTNKB = $JenisTNKB->jenis_tnkb;

    $JenisTNKB->delete();

    return redirect('/jenis-tnkb')->with('success', 'Data TNKB '.$NamaTNKB.' Berhasil di Hapus');
  }

  public function DataUser()
  {
    $User = User::all();

    return view('User.DataUser', ['User' => $User]);
  }

  public function TambahUser()
  {
    return view('User.TambahUser');
  }

  public function storeTambahUser(Request $request)
  {
    $User = new User;

    // Cek Username sudah di pakai kah balum
    $Username = User::where('username', $request->Username)
                    ->first();

    // Mun ada bulik akan ke halaman tambah lwn inputannya
    if (count($Username) > 0) {
      return back()->withInput()->with('danger', 'Username "'.$request->Username.'" Sudah digunakan Oleh "'.$Username->nama.'", Gunakan Username Lain');
    }

    $User->nip      = $request->NIP;
    $User->nama     = $request->Nama;
    $User->username = $request->Username;
    $User->password = bcrypt($request->Password);
    $User->tipe     = $request->Tipe;
    if ($request->Foto != null) {
      $NamaFoto = str_replace(' ','-',$request->NIP);
      $ExtFoto  = $request->Foto->getClientOriginalExtension();
      $Foto     = $NamaFoto.'.'.$ExtFoto;
      $request->Foto->move(public_path('Public-User/Image/Profile'), $Foto);
    }else {
      $foto = 'default.png';
    }
    $User->foto     = $request->Foto;

    $User->save();

    return redirect('/user')->with('success', 'Data User '.$request->Nama.' Berhasil di Tambahkan');
  }

  public function EditUser($id)
  {
    $ids  = Crypt::decryptString($id);
    $User = User::find($ids);

    return view('User.EditUser', ['User' => $User]);
  }

  public function storeEditUser(Request $request, $id)
  {
    $ids  = Crypt::decryptString($id);
    $User = User::find($ids);

    $NamaUser = $User->nama;

    $User->nip      = $request->NIP;
    $User->nama     = $request->Nama;
    $User->username = $request->Username;
    if ($request->Password != null) {
      $User->password = bcrypt($request->Password);
    }
    $User->tipe     = $request->Tipe;
    if ($request->Foto != null) {
      $NamaFoto = str_replace(' ','-',$request->NIP);
      $ExtFoto  = $request->Foto->getClientOriginalExtension();
      $Foto     = $NamaFoto.'.'.$ExtFoto;
      if ($User->foto != 'default.png') {
        File::delete('Public-User/Image/Profile/'.$User->foto);
      }
      $request->Foto->move(public_path('Public-User/Image/Profile'), $Foto);
      $User->foto     = $Foto;
    }

    $User->save();

    return redirect('/user')->with('success', 'Data User '.$NamaUser.' Berhasil di Ubah');
  }

  public function DataNJKB()
  {
<<<<<<< HEAD
    $NJKB = NJKB::with('MerkKendaraan','TipeKendaraan','Kendaraan')
=======
    $NJKB = NJKB::with('MerkKendaraan','TipeKendaraan')
>>>>>>> ea2daf11df1dea958e3d4e63eb5e25396949c572
                ->get();

    return view('User.DataNJKB', ['NJKB' => $NJKB]);
  }

  public function TambahNJKB()
  {
    $MerkKendaraan = MerkKendaraan::all();
    return view('User.TambahNJKB', ['MerkKendaraan' => $MerkKendaraan]);
  }

  public function storeTambahNJKB(Request $request)
  {
    $NJKB = New NJKB;

    $NJKB->merk_kendaraan_id = $request->idMerkKendaraan;
    $NJKB->tipe_kendaraan_id = $request->idTipeKendaraan;
    $NJKB->tahun_buat        = $request->TahunBuat;
    $NJKB->NJKB              = $request->NJKB;
    $NJKB->bobot             = $request->Bobot;

    $NJKB->save();

    return redirect('/njkb-kendaraan')->with('success', 'Data NJKB Berhasil di Tambahkan');
  }

  public function EditNJKB($id)
  {
    $ids  = Crypt::decryptString($id);
    $NJKB = NJKB::find($ids);

    $MerkKendaraan = MerkKendaraan::all();
    $TipeKendaraan = TipeKendaraan::where('merk_kendaraan_id', $NJKB->merk_kendaraan_id)
                                  ->get();

    return view('User.EditNJKB', ['NJKB' => $NJKB, 'MerkKendaraan' => $MerkKendaraan, 'TipeKendaraan' => $TipeKendaraan]);
  }

  public function storeEditNJKB(Request $request, $id)
  {
    $ids  = Crypt::decryptString($id);
    $NJKB = NJKB::find($ids);

    $NJKB->merk_kendaraan_id = $request->idMerkKendaraan;
    $NJKB->tipe_kendaraan_id = $request->idTipeKendaraan;
    $NJKB->tahun_buat        = $request->TahunBuat;
    $NJKB->NJKB              = $request->NJKB;
    $NJKB->bobot             = $request->Bobot;

    $NJKB->save();

    return redirect('/njkb-kendaraan')->with('success', 'Data NJKB Berhasil di Ubah');
  }

<<<<<<< HEAD
  public function HapusNJKB($id)
  {
    $ids  = Crypt::decryptString($id);
    $NJKB = NJKB::find($ids);

    $NJKB->delete();

    return redirect('/njkb-kendaraan')->with('success', 'Data NJKB Berhasil di Hapus');

  }

=======
>>>>>>> ea2daf11df1dea958e3d4e63eb5e25396949c572
  public function DataDaerahUPPD()
  {
    $DaerahUPPD = DaerahSamsat::all();

    return view('User.DataDaerahUPPD', ['DaerahUPPD' => $DaerahUPPD]);
  }

  public function TambahDaerahUPPD()
  {
    return view('User.TambahDaerahUPPD');
  }

  public function storeTambahDaerahUPPD(Request $request)
  {
    $DaerahUPPD = new DaerahSamsat;

    $DaerahUPPD->nama_daerah = $request->NamaDaerah;

    $DaerahUPPD->save();

    return redirect('/daerah-uppd')->with('success', 'Data Daerah UPPD '.$request->NamaDaerah.' Berhasil di Tambahkan');
  }

  public function EditDaerahUPPD($id)
  {
    $ids        = Crypt::decryptString($id);
    $DaerahUPPD = DaerahSamsat::find($ids);

    return view('User.EditDaerahUPPD', ['DaerahUPPD' => $DaerahUPPD]);
  }

  public function storeEditDaerahUPPD(Request $request, $id)
  {
    $ids        = Crypt::decryptString($id);
    $DaerahUPPD = DaerahSamsat::find($ids);

    $DaerahUPPD->nama_daerah = $request->NamaDaerah;

    $DaerahUPPD->save();

    return redirect('/daerah-uppd')->with('success', 'Data Daerah UPPD '.$request->NamaDaerah.' Berhasil di Ubah');
  }

  public function HapusDaerahUPPD($id)
  {
    $ids        = Crypt::decryptString($id);
    $DaerahUPPD = DaerahSamsat::find($ids);

    dd('TAHU AY HANDAK MEHAPUS '.$DaerahUPPD->nama_daerah.' TAPI JANGAN DULU GIN, KALO ERROR');
  }

  public function DataKendaraan()
  {
    $Kendaraan = Kendaraan::with('NJKB', 'JenisTNKB', 'DaerahUPPD')
                          ->get();

    return view('User.DataKendaraan', ['Kendaraan' => $Kendaraan]);
  }

  public function SingleDataKendaraan($noplat)
  {
    $Kendaraan = Kendaraan::with('NJKB', 'JenisTNKB', 'DaerahUPPD')
                          ->where('noplat', $noplat)
                          ->first();

    $TipeKendaraan = TipeKendaraan::with('MerkKendaraan', 'Golongan')
                                  ->where('id', $Kendaraan->NJKB->tipe_kendaraan_id)
                                  ->first();

    return view('User.SingleDataKendaraan', ['Kendaraan' => $Kendaraan, 'TipeKendaraan' => $TipeKendaraan]);
  }

  public function TambahKendaraan()
  {
    $JenisTNKB     = JenisTNKB::all();
    $Golongan      = Golongan::all();
    $MerkKendaraan = MerkKendaraan::all();
    $DaerahUPPD    = DaerahSamsat::all();

    return view('User.TambahKendaraan', ['JenisTNKB' => $JenisTNKB, 'Golongan' => $Golongan, 'MerkKendaraan' => $MerkKendaraan, 'DaerahUPPD' => $DaerahUPPD]);
  }

  public function storeTambahKendaraan(Request $request)
  {
    $Kendaraan = new Kendaraan;

    $Kendaraan->noplat            = $request->NoPlat;
    $Kendaraan->no_ktp            = $request->NomorKTP;
    $Kendaraan->nama              = $request->Nama;
    $Kendaraan->alamat            = $request->Alamat;
    $Kendaraan->no_rangka         = $request->NomorRangka;
    $Kendaraan->no_mesin          = $request->NomorMesin;
    $Kendaraan->masalaku          = $request->MasaLaku;
    $Kendaraan->daerah_samsat_id  = $request->idDaerahUPPD;
    $Kendaraan->njkb_id           = $request->idNJKB;
    $Kendaraan->jenis_tnkb_id     = $request->idTNKB;

    $Kendaraan->save();

    return redirect('/kendaraan')->with('success', 'Data Kendaraan '.$request->NoPlat.' Berhasil di Tambahkan');
  }

  public function UbahKendaraan($id)
  {
    $ids       = Crypt::decryptString($id);
    $Kendaraan = Kendaraan::with('NJKB', 'JenisTNKB', 'DaerahUPPD')
                          ->where('id', $ids)
                          ->first();

    $JenisTNKB     = JenisTNKB::all();
    $Golongan      = Golongan::all();
    $MerkKendaraan = MerkKendaraan::all();
    $TipeKendaraan = TipeKendaraan::where('merk_kendaraan_id', $Kendaraan->NJKB->merk_kendaraan_id)
                                  ->get();
    $DaerahUPPD    = DaerahSamsat::all();
    $NJKB          = NJKB::where('merk_kendaraan_id', $Kendaraan->NJKB->merk_kendaraan_id)
                         ->where('tipe_kendaraan_id', $Kendaraan->NJKB->tipe_kendaraan_id)
                         ->orderBy('tahun_buat', 'desc')
                         ->get();

    $TipeSelected     = TipeKendaraan::find($Kendaraan->NJKB->tipe_kendaraan_id);
    $GolonganSelected = Golongan::find($TipeSelected->golongan_id);

    return view('User.EditKendaraan', ['Kendaraan' => $Kendaraan, 'JenisTNKB' => $JenisTNKB, 'Golongan' => $Golongan, 'MerkKendaraan' => $MerkKendaraan, 'TipeKendaraan' => $TipeKendaraan, 'DaerahUPPD' => $DaerahUPPD, 'NJKB' => $NJKB, 'GolonganSelected' => $GolonganSelected]);
  }

  public function storeUbahKendaraan(Request $request, $id)
  {
    $ids       = Crypt::decryptString($id);
    $Kendaraan = Kendaraan::find($ids);

    $Kendaraan->noplat            = $request->NoPlat;
    $Kendaraan->no_ktp            = $request->NomorKTP;
    $Kendaraan->nama              = $request->Nama;
    $Kendaraan->alamat            = $request->Alamat;
    $Kendaraan->no_rangka         = $request->NomorRangka;
    $Kendaraan->no_mesin          = $request->NomorMesin;
    $Kendaraan->masalaku          = $request->MasaLaku;
    $Kendaraan->daerah_samsat_id  = $request->idDaerahUPPD;
    $Kendaraan->njkb_id           = $request->idNJKB;
    $Kendaraan->jenis_tnkb_id     = $request->idTNKB;

    $Kendaraan->save();

    return redirect('/kendaraan')->with('success', 'Data Kendaraan '.$request->NoPlat.' Berhasil di Ubah');
  }

  public function DataPelayanan()
  {
    $TanggalSekarang = Carbon::now()->format('Y-m-d');

    $User = Auth::user();
    if ($User->tipe == '1') {
      $Transaksi = Transaksi::with('Kendaraan')
                            ->whereDate('created_at', $TanggalSekarang)
                            ->whereIn('status', [0,1])
                            ->get();
    }else {
      $Transaksi = Transaksi::with('Kendaraan')
                            ->whereDate('created_at', $TanggalSekarang)
                            ->where('status', ($User->tipe))
                            ->get();
    }

    return view('User.DataPelayanan', ['Transaksi' => $Transaksi]);
  }

  public function SingleDataPelayanan($id)
  {
    $ids = Crypt::decryptString($id);
    $Transaksi = Transaksi::where('id', $ids)
                          ->with('Kendaraan', 'User')
                          ->first();

    $NJKB = NJKB::where('id', $Transaksi->Kendaraan->njkb_id)
                ->with('MerkKendaraan', 'TipeKendaraan')
                ->first();

    $Golongan = Golongan::find($NJKB->TipeKendaraan->golongan_id);

    return view('User.SingleDataPelayanan', ['Transaksi' => $Transaksi, 'NJKB' => $NJKB, 'Golongan' => $Golongan]);
  }

  public function submitSingleDataPelayanan(Request $request, $id)
  {
    $ids = Crypt::decryptString($id);
    $Transaksi = Transaksi::find($ids);

    if ($request->Arahan == '5') {
      $Kendaraan = Kendaraan::find($Transaksi->kendaraan_id);

      $MasaLaku = Carbon::parse($Kendaraan->masalaku);
      $TanggalSekarang = Carbon::now();

      $BedaTahun = $MasaLaku->diffInYears($TanggalSekarang);

      $UpdateTahun = $MasaLaku->addYears($BedaTahun+1);

      $Kendaraan->masalaku = $UpdateTahun;

      $Kendaraan->save();
    }

    $Transaksi->status = $request->Arahan;
    $Transaksi->keterangan = $request->Keterangan;
    $Transaksi->user_id = Auth::user()->id;

    $Transaksi->save();

    return redirect('/pelayanan')->with('success', 'Data Berhasil di Simpan');
  }

  public function LaporanPendapatanPKB()
  {
    $Transaksi = Transaksi::with('Kendaraan')
                          ->where('status', '4')
                          ->get();
    //
    $Golongan   = Golongan::all();
    $DaerahUPPD = DaerahSamsat::all();

    return view('User.LaporanPendapatanPKB', ['Transaksi' => $Transaksi, 'Golongan' => $Golongan, 'DaerahUPPD' => $DaerahUPPD]);
  }

  public function LaporanPendapatanPKBFilter(Request $request)
  {
    $TanggalAkhir = Carbon::parse($request->TanggalAkhir)->addDay();

    $Transaksi = Transaksi::with('Kendaraan')
                          ->whereBetween('created_at', [$request->TanggalAwal, $TanggalAkhir])
                          ->where('status', '4')
                          ->get();
    //
    $Golongan   = Golongan::all();
    $DaerahUPPD = DaerahSamsat::all();

    return view('User.LaporanPendapatanPKBFilter', ['Transaksi' => $Transaksi, 'Golongan' => $Golongan, 'DaerahUPPD' => $DaerahUPPD, 'TanggalAwal' => $request->TanggalAwal, 'TanggalAkhir' => $request->TanggalAkhir]);
  }

  public function PrintLaporanPendapatanPKB()
  {
    $Transaksi = Transaksi::with('Kendaraan')
                          ->where('status', '4')
                          ->get();
    //
    $pdf = PDF::loadView('Laporan.PendapatanPKB', ['Transaksi' => $Transaksi]);
    $pdf->setPaper('a4', 'landscape');
    return $pdf->stream('Laporan Pendapatan PKB.pdf', ['Attachment' => 0]);
  }

  public function PrintLaporanPendapatanPKBFilter($TanggalAwal, $TanggalAkhir)
  {
    $TanggalAkhirs = Carbon::parse($TanggalAkhir)->addDay();

    $Transaksi = Transaksi::with('Kendaraan')
                          ->whereBetween('created_at', [$TanggalAwal, $TanggalAkhirs])
                          ->where('status', '4')
                          ->get();
    //
    $pdf = PDF::loadView('Laporan.PendapatanPKBFilter', ['Transaksi' => $Transaksi, 'TanggalAwal' => $TanggalAwal, 'TanggalAkhir' => $TanggalAkhir]);
    $pdf->setPaper('a4', 'landscape');
    return $pdf->stream('Laporan Pendapatan PKB.pdf', ['Attachment' => 0]);
  }

  public function LaporanPendapatanSWDKLJJ()
  {
    $Transaksi = Transaksi::with('Kendaraan')
                          ->where('status', '4')
                          ->get();
    //
    $Golongan   = Golongan::all();
    $DaerahUPPD = DaerahSamsat::all();

    return view('User.LaporanPendapatanSWDKLJJ', ['Transaksi' => $Transaksi, 'Golongan' => $Golongan, 'DaerahUPPD' => $DaerahUPPD]);
  }

  public function LaporanPendapatanSWDKLJJFilter(Request $request)
  {
    $TanggalAkhir = Carbon::parse($request->TanggalAkhir)->addDay();

    $Transaksi = Transaksi::with('Kendaraan')
                          ->whereBetween('created_at', [$request->TanggalAwal, $TanggalAkhir])
                          ->where('status', '4')
                          ->get();
    //
    $Golongan   = Golongan::all();
    $DaerahUPPD = DaerahSamsat::all();

    return view('User.LaporanPendapatanSWDKLJJFilter', ['Transaksi' => $Transaksi, 'Golongan' => $Golongan, 'DaerahUPPD' => $DaerahUPPD, 'TanggalAwal' => $request->TanggalAwal, 'TanggalAkhir' => $request->TanggalAkhir]);
  }

  public function PrintLaporanPendapatanSWDKLJJ()
  {
    $Transaksi = Transaksi::with('Kendaraan')
                          ->where('status', '4')
                          ->get();
    //
    $pdf = PDF::loadView('Laporan.PendapatanSWDKLJJ', ['Transaksi' => $Transaksi]);
    $pdf->setPaper('a4', 'landscape');
    return $pdf->stream('Laporan Pendapatan SWDKLJJ.pdf', ['Attachment' => 0]);
  }

  public function PrintLaporanPendapatanSWDKLJJFilter($TanggalAwal, $TanggalAkhir)
  {
    $TanggalAkhirs = Carbon::parse($TanggalAkhir)->addDay();

    $Transaksi = Transaksi::with('Kendaraan')
                          ->whereBetween('created_at', [$TanggalAwal, $TanggalAkhirs])
                          ->where('status', '4')
                          ->get();
    //
    $pdf = PDF::loadView('Laporan.PendapatanSWDKLJJFilter', ['Transaksi' => $Transaksi, 'TanggalAwal' => $TanggalAwal, 'TanggalAkhir' => $TanggalAkhir]);
    $pdf->setPaper('a4', 'landscape');
    return $pdf->stream('Laporan Pendapatan SWDKLJJ.pdf', ['Attachment' => 0]);
  }

  public function LaporanKendaraanPajakMati()
  {
    $TanggalSekarang = Carbon::now();
    $Kendaraan = Kendaraan::whereDate('masalaku', '<=', $TanggalSekarang)
                          ->get();

    //
    return view('User.LaporanKendaraanPajakMati', ['Kendaraan' => $Kendaraan]);
  }

  public function LaporanKendaraanPajakMatiFilter(Request $request)
  {
    $TanggalAkhir = Carbon::parse($request->TanggalAkhir)->addDay();
    $TanggalSekarang = Carbon::now();

    $Kendaraan = Kendaraan::whereDate('masalaku', '<=', $TanggalSekarang)
                          ->whereBetween('masalaku', [$request->TanggalAwal, $TanggalAkhir])
                          ->get();
    //
    $Golongan   = Golongan::all();
    $DaerahUPPD = DaerahSamsat::all();

    return view('User.LaporanKendaraanPajakMatiFilter', ['Kendaraan' => $Kendaraan, 'TanggalAwal' => $request->TanggalAwal, 'TanggalAkhir' => $request->TanggalAkhir]);
  }

  public function PrintLaporanKendaraanPajakMati()
  {
    $TanggalSekarang = Carbon::now();
    $Kendaraan = Kendaraan::whereDate('masalaku', '<=', $TanggalSekarang)
                          ->get();

    //
    $pdf = PDF::loadView('Laporan.KendaraanPajakMati', ['Kendaraan' => $Kendaraan]);
    $pdf->setPaper('a4', 'landscape');
    return $pdf->stream('Laporan Kendaraan Pajak Mati.pdf', ['Attachment' => 0]);
  }

  public function PrintLaporanKendaraanPajakMatiFilter($TanggalAwal, $TanggalAkhir)
  {
    $TanggalAkhirs = Carbon::parse($TanggalAkhir)->addDay();
    $TanggalSekarang = Carbon::now();

    $Kendaraan = Kendaraan::whereDate('masalaku', '<=', $TanggalSekarang)
                          ->whereBetween('masalaku', [$TanggalAwal, $TanggalAkhirs])
                          ->get();
    //
    $pdf = PDF::loadView('Laporan.KendaraanPajakMatiFilter', ['Kendaraan' => $Kendaraan, 'TanggalAwal' => $TanggalAwal, 'TanggalAkhir' => $TanggalAkhir]);
    $pdf->setPaper('a4', 'landscape');
    return $pdf->stream('Laporan Kendaraan Pajak Mati.pdf', ['Attachment' => 0]);
  }

  public function LaporanKendaraanBayarPajak()
  {
    dd('Wait, Bingung Ini Handak di Olah Kayapa? Skip Dulu Lah Ini');
  }

  public function LaporanRegistrasiBatal()
  {
    $Transaksi = Transaksi::with('Kendaraan')
                          ->where('status', '5')
                          ->get();

    //
    return view('User.LaporanRegistrasiBatal', ['Transaksi' => $Transaksi]);
  }

  public function LaporanRegistrasiBatalFilter(Request $request)
  {
    $TanggalAkhirs = Carbon::parse($request->TanggalAkhir)->addDay();

    $Transaksi = Transaksi::with('Kendaraan')
                          ->where('status', '5')
                          ->whereBetween('created_at', [$request->TanggalAwal, $TanggalAkhirs])
                          ->get();

    //
    return view('User.LaporanRegistrasiBatalFilter', ['Transaksi' => $Transaksi, 'TanggalAwal' => $request->TanggalAwal, 'TanggalAkhir' => $request->TanggalAkhir]);
  }

  public function PrintLaporanRegistrasiBatal()
  {
    $Transaksi = Transaksi::with('Kendaraan')
                          ->where('status', '5')
                          ->get();
    //
    $pdf = PDF::loadView('Laporan.RegistrasiBatal', ['Transaksi' => $Transaksi]);
    $pdf->setPaper('a4', 'landscape');
    return $pdf->stream('Laporan Registrasi Batal.pdf', ['Attachment' => 0]);
  }

  public function PrintLaporanRegistrasiBatalFilter($TanggalAwal, $TanggalAkhir)
  {
    $TanggalAkhirs = Carbon::parse($TanggalAkhir)->addDay();

    $Transaksi = Transaksi::with('Kendaraan')
                          ->where('status', '5')
                          ->whereBetween('created_at', [$TanggalAwal, $TanggalAkhirs])
                          ->get();

    $pdf = PDF::loadView('Laporan.RegistrasiBatalFilter', ['Transaksi' => $Transaksi, 'TanggalAwal' => $TanggalAwal, 'TanggalAkhir' => $TanggalAkhir]);
    $pdf->setPaper('a4', 'landscape');
    return $pdf->stream('Laporan Registrasi Batal.pdf', ['Attachment' => 0]);
  }

<<<<<<< HEAD
  public function LaporanKendaraan()
  {
    $Kendaraan = Kendaraan::all();

    $Golongan      = Golongan::all();
    $MerkKendaraan = MerkKendaraan::all();

    return view('User.LaporanKendaraan', ['Kendaraan' => $Kendaraan, 'Golongan' => $Golongan, 'MerkKendaraan' => $MerkKendaraan]);
  }

  public function LaporanKendaraanFilter(Request $request)
  {
    // GOLONGAN !!!!
    if ($request->idGolongan != '0') {
      $TipeKendaraan = TipeKendaraan::where('golongan_id', $request->idGolongan)
                                    ->get();
    } else {
      $TipeKendaraan = TipeKendaraan::all();
    }

    $IndexIdTipeKendaraan = 0;
    if (count($TipeKendaraan) == 0) {
      $IdTipeKendaraan[1] = '01012011';
    }else{
      foreach ($TipeKendaraan as $DataTipeKendaraan) {
        $IndexIdTipeKendaraan += 1;
        $IdTipeKendaraan[$IndexIdTipeKendaraan] = $DataTipeKendaraan->id;
      }
    }

    if ($request->idMerk != '0') {
      $NJKB = NJKB::whereIn('tipe_kendaraan_id', $IdTipeKendaraan)
                  ->where('merk_kendaraan_id', $request->idMerk)
                  ->get();
    } else {
      $NJKB = NJKB::whereIn('tipe_kendaraan_id', $IdTipeKendaraan)
                  ->get();
    }

    $IndexIdNJKB = 0;
    if (count($NJKB) == 0) {
      $IdNJKB[1] = '01012011';
    } else {
      foreach ($NJKB as $DataNJKB) {
        $IndexIdNJKB += 1;
        $IdNJKB[$IndexIdNJKB] = $DataNJKB->id;
      }
    }


    $Golongan      = Golongan::all();
    $MerkKendaraan = MerkKendaraan::all();

    $Kendaraan = Kendaraan::whereIn('NJKB_id', $IdNJKB)
                          ->get();

    return view('User.LaporanKendaraanFilter', ['Kendaraan' => $Kendaraan, 'Golongan' => $Golongan, 'MerkKendaraan' => $MerkKendaraan, 'idGolongan' => $request->idGolongan, 'idMerk' => $request->idMerk]);
  }

  public function PrintLaporanKendaraan()
  {
    $Kendaraan = Kendaraan::all();

    // dd($Kendaraan->first()->NJKB->TipeKendaraan->tipe);

    $pdf = PDF::loadView('Laporan.Kendaraan', ['Kendaraan' => $Kendaraan]);
    $pdf->setPaper('a4', 'landscape');
    return $pdf->stream('Laporan Kendaraan.pdf', ['Attachment' => 0]);
  }

  public function PrintLaporanKendaraanFilter($idGolongan, $idMerk)
  {
    // GOLONGAN !!!!
    if ($idGolongan != '0') {
      $TipeKendaraan = TipeKendaraan::where('golongan_id', $idGolongan)
                                    ->get();
    } else {
      $TipeKendaraan = TipeKendaraan::all();
    }

    $IndexIdTipeKendaraan = 0;
    if (count($TipeKendaraan) == 0) {
      $IdTipeKendaraan[1] = '01012011';
    }else{
      foreach ($TipeKendaraan as $DataTipeKendaraan) {
        $IndexIdTipeKendaraan += 1;
        $IdTipeKendaraan[$IndexIdTipeKendaraan] = $DataTipeKendaraan->id;
      }
    }

    if ($idMerk != '0') {
      $NJKB = NJKB::whereIn('tipe_kendaraan_id', $IdTipeKendaraan)
                  ->where('merk_kendaraan_id', $idMerk)
                  ->get();
    } else {
      $NJKB = NJKB::whereIn('tipe_kendaraan_id', $IdTipeKendaraan)
                  ->get();
    }

    $IndexIdNJKB = 0;
    if (count($NJKB) == 0) {
      $IdNJKB[1] = '01012011';
    } else {
      foreach ($NJKB as $DataNJKB) {
        $IndexIdNJKB += 1;
        $IdNJKB[$IndexIdNJKB] = $DataNJKB->id;
      }
    }


    $Golongan      = Golongan::all();
    $MerkKendaraan = MerkKendaraan::all();

    $Kendaraan = Kendaraan::whereIn('NJKB_id', $IdNJKB)
                          ->get();

    //
    $pdf = PDF::loadView('Laporan.KendaraanFilter', ['Kendaraan' => $Kendaraan, 'idGolongan' => $idGolongan, 'idMerk' => $idMerk]);
    $pdf->setPaper('a4', 'landscape');
    return $pdf->stream('Laporan Kendaraan.pdf', ['Attachment' => 0]);
  }
=======
>>>>>>> ea2daf11df1dea958e3d4e63eb5e25396949c572




  public function InfoKendaraan()
  {
    return view('User.InfoKendaraan');
  }

  public function submitInfoKendaraan(Request $request)
  {
    $Kendaraan = Kendaraan::where($request->method, $request->inputan)
                          ->first();

    return view('User.DataInfoKendaraan');
    if (count($Kendaraan) > 0) {
      dd($Kendaraan);
    } else {
      dd('Apa yang ikam cari??');
    }

  }

  public function password()
  {
    dd(bcrypt('123456'));
  }

  // Untuk Json Tipe
  public function Tipe($id)
  {
    $Tipe = TipeKendaraan::where('merk_kendaraan_id', $id)->get();
<<<<<<< HEAD
    return $Tipe;
  }

  public function TipeGolongan($idMerk, $idGol)
  {
    $Tipe = TipeKendaraan::where('merk_kendaraan_id', $idMerk)
                         ->where('golongan_id', $idGol)
                         ->get();
    return $Tipe;
  }

=======
    return $Tipe;
  }

  public function TipeGolongan($idMerk, $idGol)
  {
    $Tipe = TipeKendaraan::where('merk_kendaraan_id', $idMerk)
                         ->where('golongan_id', $idGol)
                         ->get();
    return $Tipe;
  }

>>>>>>> ea2daf11df1dea958e3d4e63eb5e25396949c572
  public function TahunBuat($idMerk, $idTipe)
  {
    $NJKB = NJKB::where('merk_kendaraan_id', $idMerk)
                ->where('tipe_kendaraan_id', $idTipe)
                ->orderBy('tahun_buat', 'desc')
                ->get();
    return $NJKB;
  }
  // Coba Coba Ini
  public function testah()
  {
    $MerkKendaraan = MerkKendaraan::all();
    return view('TestSelectBertingkat', ['MerkKendaraan' => $MerkKendaraan]);
  }
}
