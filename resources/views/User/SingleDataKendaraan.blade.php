@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Data Kendaraan
        @endsection
        Data Kendaraan - {{$Kendaraan->noplat}}
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
        <div class="box-header">
          <div class="col-md-2">
            <a href="/kendaraan">
              <button type="button" class="btn btn-block btn-info">
                <i class="fa fa-chevron-left"></i> <b>Kembali</b>
              </button>
            </a>
          </div>
        </div>
        <div class="box-body">
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <td style="width:15%;">Nomor Polisi</td>
                <td>{{$Kendaraan->noplat}}</td>
              </tr>
              <tr>
                <td>Nomor Polisi (Lama)</td>
                <td>{{$Kendaraan->noplat_lama}}</td>
              </tr>
              <tr>
                <td>Jenis TNKB</td>
                <td>{{$Kendaraan->JenisTNKB->jenis_tnkb}}</td>
              </tr>
              <tr>
                <td>Merk Kendaraan</td>
                <td>{{$TipeKendaraan->MerkKendaraan->merk}}</td>
              </tr>
              <tr>
                <td>Tipe Kendaraan</td>
                <td>{{$TipeKendaraan->tipe}}</td>
              </tr>
              <tr>
                <td>Tahun Buat</td>
                <td>{{$Kendaraan->NJKB->tahun_buat}}</td>
              </tr>
              <tr>
                <td>Golongan</td>
                <td>{{$TipeKendaraan->Golongan->golongan}}</td>
              </tr>
              <tr>
                <td>Nomor KTP</td>
                <td>{{$Kendaraan->no_ktp}}</td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>{{$Kendaraan->nama}}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>{{$Kendaraan->alamat}}</td>
              </tr>
              <tr>
                <td>Nomor Rangka</td>
                <td>{{$Kendaraan->no_rangka}}</td>
              </tr>
              <tr>
                <td>Nomor Mesin</td>
                <td>{{$Kendaraan->no_mesin}}</td>
              </tr>
              <tr>
                <td>Daerah Samsat</td>
                <td>{{$Kendaraan->DaerahUPPD->nama_daerah}}</td>
              </tr>
              <tr>
                <td>Masa Laku</td>
                <td>{{Carbon\Carbon::parse($Kendaraan->masalaku)->format('d-m-Y')}}</td>
              </tr>
              <tr>
                <td>Status</td>
                <td>
                  @if (Carbon\Carbon::parse($Kendaraan->masalaku)->format('Y-m-d') >= Carbon\Carbon::now()->format('Y-m-d'))
                    @php
                      $Mati = false;
                      $DiffMasaLakuTahun = (Carbon\Carbon::now()->diffInYears(Carbon\Carbon::parse($Kendaraan->masalaku)));
                      $DiffMasaLakuBulan = (Carbon\Carbon::now()->diffInMonths(Carbon\Carbon::parse($Kendaraan->masalaku)));
                    @endphp
                    <span class="pull badge bg-blue">Pajak Hidup</span>
                  @else
                    @php
                      $Mati = true;
                      $DiffMasaLakuTahun = (Carbon\Carbon::now()->diffInYears(Carbon\Carbon::parse($Kendaraan->masalaku))+1);
                      $DiffMasaLakuBulan = floor(((Carbon\Carbon::now()->diffInMonths(Carbon\Carbon::parse($Kendaraan->masalaku)))/3)+1);
                    @endphp
                    <span class="pull badge bg-red">Pajak Mati</span>
                    <span class="pull badge bg-yellow">{{$DiffMasaLakuTahun}} Tahun</span>
                  @endif
                </td>
              </tr>
              <tr>
                <td>PKB</td>
                <td>Rp.
                  @php
                    $BiayaPKB = ($Kendaraan->NJKB->NJKB*$Kendaraan->NJKB->bobot)*($Kendaraan->JenisTNKB->bobot/100);
                  @endphp
                  {{number_format($BiayaPKB*($DiffMasaLakuTahun+1))}}
                  @if ($Mati)
                    (Rp. {{number_format($BiayaPKB)}} per Tahun)
                  @endif
                </td>
              </tr>
              <tr>
                <td>Denda PKB</td>
                <td>Rp.
                  @if ($Mati)
                    {{number_format(($BiayaPKB*25/100)*($DiffMasaLakuTahun))}}
                    (Rp. {{number_format($BiayaPKB*25/100)}} per Tahun)
                  @else
                    0
                  @endif
                </td>
              </tr>
              <tr>
                <td>SWDKLJJ</td>
                <td>Rp.
                  @php
                    $BiayaSWDKLJJ = $TipeKendaraan->Golongan->biaya_sw;
                    $BiayaAdm     = $TipeKendaraan->Golongan->biaya_adm;
                  @endphp
                  @if ($Mati)
                    {{number_format(($BiayaSWDKLJJ+$BiayaAdm)*($DiffMasaLakuTahun))}}
                    (Rp. {{number_format($BiayaSWDKLJJ+$BiayaAdm)}} per Tahun)
                  @else
                    {{number_format(($BiayaSWDKLJJ+$BiayaAdm)*($DiffMasaLakuTahun+1))}}
                  @endif
                </td>
              </tr>
              <tr>
                <td>Denda SWDKLJJ</td>
                <td>Rp.
                  @if ($Mati)
                    {{number_format(($BiayaSWDKLJJ*(25/100))*$DiffMasaLakuBulan)}}
                  @else
                    0
                  @endif
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
