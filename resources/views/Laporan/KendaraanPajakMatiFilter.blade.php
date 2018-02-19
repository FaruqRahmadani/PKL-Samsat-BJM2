<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style>
      table{
        border-collapse: collapse;
        margin-top: 20px;
        margin-bottom: 30px;
      }
      table, th, td{
        width: 100%;
        border: 1px solid #708090;
      }
      td{
        height: 35px;
      }
      th{
        background-color: #3CB371;
        text-align: center;
      }
      div.header{
        padding-top: -115px;
        margin-left: 100px;
        margin-bottom: 10px;
      }
      img{
        margin-left: 200px;
        height: 100px;
        width: 100px;
      }
      h4{
        text-align: left;
        padding-bottom: -20px;
      }
      h2{
        text-align: left;
        padding-bottom: -20px;
      }
      h5{
        margin-bottom: 0px;
      }
      hr.atas{
        border: 1px solid black;
        width: 800px;
        margin-top: -30px;
        margin-bottom: 40px;
      }
      hr.bawah{
        margin-top: 0px;
        width: 100%;
        border: 1px solid #708090;
      }
    </style>
    <title>LAPORAN KENDARAAN PAJAK MATI</title>
  </head>
  <body>
    @php
      $no = 0;
    @endphp
    <img src="Public-User/Image/Logo/LogoPemprovKalsel.png">
    <div class="header">
      <h4 style="text-align: center;">PEMERINTAH PROVINSI KALIMANTAN SELATAN</h4>
      <h4 style="text-align: center;">BADAN KEUANGAN DAERAH</h4>
      <h4 style="text-align: center;">UNIT PELAYANAN PENDAPATAN DAERAH (UPPD)</h4>
      <h2 style="text-align: center;">BANJARMASIN II</h2>
      <p style="text-align: center;">Jl. Brig. Jend. H. Hasan Basri RT.1 RW.1 No. 07 Kode Pos.70123 Banjarmasin</p>
    </div>
    <br>
    <hr class="atas">
    <h5>Laporan Kendaraan Pajak Mati Tanggal : {{Carbon\Carbon::parse($TanggalAwal)->format('d-m-Y')}} - {{Carbon\Carbon::parse($TanggalAkhir)->format('d-m-Y')}}</h5>
    <hr class="bawah">
    <table>
      <thead>
          <tr>
              <th style="width: 25px;">No</th>
              <th style="width: 125px;">Nama</th>
              <th style="width: 100px;">Nomor Polisi</th>
              <th style="width: 100px;">Potensi PKB</th>
              <th style="width: 100px;">Potensi Denda PKB</th>
              <th style="width: 100px;">Potensi SWDKLJJ</th>
              <th style="width: 100px;">Potensi DendaSWDKLJJ</th>
              <th style="width: 75px;">Masa Laku</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($Kendaraan as $DataKendaraan)
          @php
            $DiffMasaLakuTahun = (Carbon\Carbon::now()->diffInYears(Carbon\Carbon::parse($DataKendaraan->masalaku))+1);
            $DiffMasaLakuBulan = floor(((Carbon\Carbon::now()->diffInMonths(Carbon\Carbon::parse($DataKendaraan->masalaku)))/3)+1);
            $DasarPKB  = ($DataKendaraan->NJKB->NJKB * $DataKendaraan->NJKB->bobot);
            $BobotTNKB = $DataKendaraan->JenisTNKB->bobot/100;
            $PKB       = $DasarPKB * $BobotTNKB * ($DiffMasaLakuTahun+1);
            $DendaPKB  = $PKB * (25/100) / ($DiffMasaLakuTahun+1);

            $biaya_sw     = $DataKendaraan->NJKB->TipeKendaraan->Golongan->biaya_sw;
            $biaya_adm    = $DataKendaraan->NJKB->TipeKendaraan->Golongan->biaya_adm;
            $SWDKLJJ      = ($biaya_sw + $biaya_adm) * $DiffMasaLakuTahun;
            $DendaSWDKLJJ = ($biaya_sw) * (25/100) * $DiffMasaLakuBulan;
          @endphp
          <tr>
            <td style="text-align: center;">{{$no = $no+1}}</td>
            <td style="padding-left: 5px;">{{$DataKendaraan->nama}}</td>
            <td style="padding-left: 5px;">{{$DataKendaraan->noplat}}</td>
            <td style="padding-left: 5px;">Rp. {{number_format($PKB)}}</td>
            <td style="padding-left: 5px;">Rp. {{number_format($DendaPKB)}}</td>
            <td style="padding-left: 5px;">Rp. {{number_format($SWDKLJJ)}}</td>
            <td style="padding-left: 5px;">Rp. {{number_format($DendaSWDKLJJ)}}</td>
            <td style="padding-left: 5px;">{{Carbon\Carbon::parse($DataKendaraan->masalaku)->format('d-m-Y')}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
