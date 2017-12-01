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
    <title>LAPORAN PENDAPATAN PKB</title>
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
    <h5>Laporan Pendapatan PKB</h5>
    <hr class="bawah">
    <table>
      <thead>
          <tr>
              <th style="width: 25px;">No</th>
              <th style="width: 125px;">Nama</th>
              <th style="width: 100px;">Nomor Polisi</th>
              <th style="width: 50px;">Tipe Kendaraan</th>
              <th style="width: 90px;">Golongan</th>
              <th style="width: 90px;">SWDKLJJ</th>
              <th style="width: 100px;">Daerah UPPD</th>
              <th style="width: 150px;">Waktu Daftar</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($Transaksi as $DataTransaksi)
          <tr>
            <td style="text-align: center;">{{$no = $no+1}}</td>
            <td style="padding-left: 5px;">{{$DataTransaksi->Kendaraan->nama}}</td>
            <td style="padding-left: 5px;">{{$DataTransaksi->Kendaraan->noplat}}</td>
            <td style="padding-left: 5px;">{{$DataTransaksi->Kendaraan->NJKB->TipeKendaraan->tipe}}</td>
            <td style="padding-left: 5px;">{{$DataTransaksi->Kendaraan->NJKB->TipeKendaraan->Golongan->golongan}}</td>
            <td style="padding-left: 5px;">Rp. {{number_format($DataTransaksi->swdkljj)}}</td>
            <td style="padding-left: 5px;">{{$DataTransaksi->Kendaraan->DaerahUPPD->nama_daerah}}</td>
            <td style="padding-left: 5px;">{{Carbon\Carbon::parse($DataTransaksi->created_at)->format('d-m-Y H:i:s')}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
