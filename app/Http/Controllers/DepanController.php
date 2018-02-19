<?php

namespace App\Http\Controllers;

use Crypt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Kendaraan;
use App\Transaksi;
use App\TipeKendaraan;

class DepanController extends Controller
{
  public function Index()
  {
    return view('Depan.Depan');
    // return view('Depan.Index');
  }

  public function InfoPajak(Request $request)
  {
    $Kendaraan = Kendaraan::with('NJKB', 'JenisTNKB', 'DaerahUPPD')
                          ->where('noplat', $request->NomorPlat)
                          ->first();

    if (count($Kendaraan) < 1) {
      return redirect('/#infopajak')->withInput()->with('warning', 'Nomor Plat Tidak di Temukan');
    }

    $TipeKendaraan = TipeKendaraan::with('MerkKendaraan', 'Golongan')
                                  ->where('id', $Kendaraan->NJKB->tipe_kendaraan_id)
                                  ->first();

    $Transaksi = Transaksi::where('kendaraan_id', $Kendaraan->id)
                          ->get();

    $Total = 0;
    foreach ($Transaksi as $DataTransaksi) {
      $Tanggal = Carbon::parse($DataTransaksi->created_at)->format('d-m-Y');
      $TanggalSekarang = Carbon::now()->format('d-m-Y');
      if ($Tanggal == $TanggalSekarang) {
        $Total += 1;
      }
    }


    return view('Depan.Depan', ['Kendaraan' => $Kendaraan, 'TipeKendaraan' => $TipeKendaraan, 'Total' => $Total, 'InfoPajak' => 1]);
  }

  public function CekStatus(Request $request)
  {
    $Tanggal = Carbon::now()->format('Y-m-d');
    $Kendaraan = Kendaraan::where('noplat', $request->NomorPlat)
                          ->first();

    $Transaksi = Transaksi::where('kendaraan_id', $Kendaraan->id)
                          ->whereDate('created_at', $Tanggal)
                          ->first();

    if (count($Transaksi) < 1) {
      return redirect('/#cekStatus')->withInput()->with('warning', 'Nomor Plat Belum Registrasi');
    }

    switch ($Transaksi->status) {
      case '0':
        $Status = 'Berkas Di Terima';
        break;

      case '1':
        $Status = 'Pelayanan';
        break;

      case '2':
        $Status = 'Jasa Raharja';
        break;

      case '3':
        $Status = 'Kasir';
        break;

      case '4':
        $Status = 'Master';
        break;

      case '5':
        $Status = 'Selesai';
        break;

      case '6':
        $Status = 'Di Batalkan';
        break;

      default:
        # code...
        break;
    }

    return view('Depan.Depan', ['Kendaraan' => $Kendaraan ,'Transaksi' => $Transaksi, 'Status' => $Status, 'cekStatus' => 1]);
  }

  public function FormBayarPajak($noplat, $PKB, $SWDKLJJ)
  {
    return view('Depan.BayarPajak', ['NoPlat' => $noplat]);
  }

  public function submitFormBayarPajak(Request $request, $noplat, $PKB, $SWDKLJJ)
  {
    $PKBz = Crypt::decryptString($PKB);
    $SWDKLJJz = Crypt::decryptString($SWDKLJJ);

    $Kendaraan = Kendaraan::where('noplat', $noplat)
                          ->first();

    $Transaksi = new Transaksi;

    $FotoKtpExt  = $request->foto_ktp->getClientOriginalExtension();
    $FotoKtpNama = Carbon::now()->format('dmY').'-'.$noplat.'-KTP.'.$FotoKtpExt;

    $FotoSTNKExt = $request->foto_stnk->getClientOriginalExtension();
    $FotoSTNKNama = Carbon::now()->format('dmY').'-'.$noplat.'-STNK.'.$FotoSTNKExt;

    $FotoPajakExt = $request->foto_pajak->getClientOriginalExtension();
    $FotoPajakNama = Carbon::now()->format('dmY').'-'.$noplat.'-Pajak.'.$FotoPajakExt;

    $request->foto_ktp->move(public_path('/Image-Transaksi/KTP'), $FotoKtpNama);
    $request->foto_stnk->move(public_path('/Image-Transaksi/STNK'), $FotoSTNKNama);
    $request->foto_pajak->move(public_path('/Image-Transaksi/Pajak'), $FotoPajakNama);

    $Transaksi->kendaraan_id = $Kendaraan->id;
    $Transaksi->foto_ktp = $FotoKtpNama;
    $Transaksi->foto_stnk = $FotoSTNKNama;
    $Transaksi->foto_pajak = $FotoPajakNama;
    $Transaksi->pkb = $PKBz;
    $Transaksi->swdkljj = $SWDKLJJz;

    $Transaksi->save();

    return redirect('/')->with('success', 'Registrasi Daftar Pajak Tahunan '.$noplat.' Berhasil');
  }

  public function Informasi()
  {
    return view('Depan.Informasi');
  }

  public function FormLogin()
  {
    return view('Depan.FormLogin');
  }

  public function submitFormLogin(Request $request)
  {
    dd($request);
  }
}
