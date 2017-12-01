@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Data Pelayanan
        @endsection
        Data Pelayanan - {{$Transaksi->Kendaraan->noplat}}
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
        <div class="box-header">
          <div class="col-md-2">
            <a href="/pelayanan">
              <button type="button" class="btn btn-block btn-info">
                <i class="fa fa-chevron-left"></i> <b>Kembali</b>
              </button>
            </a>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">

              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <td style="width:50%;">Nomor Polisi</td>
                    <td>{{$Transaksi->Kendaraan->noplat}}</td>
                  </tr>
                  <tr>
                    <td>Nomor Polisi (Lama)</td>
                    <td>{{$Transaksi->Kendaraan->noplat_lama}}</td>
                  </tr>
                  <tr>
                    <td>Jenis TNKB</td>
                    <td>{{$Transaksi->Kendaraan->JenisTNKB->jenis_tnkb}}</td>
                  </tr>
                  <tr>
                    <td>Merk Kendaraan</td>
                    <td>{{$NJKB->MerkKendaraan->merk}}</td>
                  </tr>
                  <tr>
                    <td>Tipe Kendaraan</td>
                    <td>{{$NJKB->TipeKendaraan->tipe}}</td>
                  </tr>
                  <tr>
                    <td>Tahun Buat</td>
                    <td>{{$Transaksi->Kendaraan->NJKB->tahun_buat}}</td>
                  </tr>
                  <tr>
                    <td>Golongan</td>
                    <td>{{$Golongan->golongan}}</td>
                  </tr>
                  <tr>
                    <td>Nomor KTP</td>
                    <td>{{$Transaksi->Kendaraan->no_ktp}}</td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td>{{$Transaksi->Kendaraan->nama}}</td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>{{$Transaksi->Kendaraan->alamat}}</td>
                  </tr>
                  <tr>
                    <td>Nomor Rangka</td>
                    <td>{{$Transaksi->Kendaraan->no_rangka}}</td>
                  </tr>
                  <tr>
                    <td>Nomor Mesin</td>
                    <td>{{$Transaksi->Kendaraan->no_mesin}}</td>
                  </tr>
                  <tr>
                    <td>Daerah Samsat</td>
                    <td>{{$Transaksi->Kendaraan->DaerahUPPD->nama_daerah}}</td>
                  </tr>
                  <tr>
                    <td>Masa Laku</td>
                    <td>{{Carbon\Carbon::parse($Transaksi->Kendaraan->masalaku)->format('d-m-Y')}}</td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>
                      @if (Carbon\Carbon::parse($Transaksi->Kendaraan->masalaku)->format('Y-m-d') >= Carbon\Carbon::now()->format('Y-m-d'))
                        @php
                          $Mati = false;
                          $DiffMasaLakuTahun = (Carbon\Carbon::now()->diffInYears(Carbon\Carbon::parse($Transaksi->Kendaraan->masalaku)));
                          $DiffMasaLakuBulan = (Carbon\Carbon::now()->diffInMonths(Carbon\Carbon::parse($Transaksi->Kendaraan->masalaku)));
                        @endphp
                        <span class="pull badge bg-blue">Pajak Hidup</span>
                      @else
                        @php
                          $Mati = true;
                          $DiffMasaLakuTahun = (Carbon\Carbon::now()->diffInYears(Carbon\Carbon::parse($Transaksi->Kendaraan->masalaku))+1);
                          $DiffMasaLakuBulan = floor(((Carbon\Carbon::now()->diffInMonths(Carbon\Carbon::parse($Transaksi->Kendaraan->masalaku)))/3)+1);
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
                        $BiayaPKB = ($Transaksi->Kendaraan->NJKB->NJKB*$Transaksi->Kendaraan->NJKB->bobot)*($Transaksi->Kendaraan->JenisTNKB->bobot/100);
                        $TotalPKB = $BiayaPKB*($DiffMasaLakuTahun+1);
                      @endphp
                      {{number_format($TotalPKB)}}
                      @if ($Mati)
                        (Rp. {{number_format($BiayaPKB)}} per Tahun)
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Denda PKB</td>
                    <td>Rp.
                      @if ($Mati)
                        @php
                          $DendaPKB      = $BiayaPKB*25/100;
                          $TotalDendaPKB = $DendaPKB*($DiffMasaLakuTahun);
                        @endphp
                        {{number_format($TotalDendaPKB)}}
                        (Rp. {{number_format($DendaPKB)}} per Tahun)
                      @else
                        @php
                          $TotalDendaPKB = 0;
                        @endphp
                        {{$TotalDendaPKB}}
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>SWDKLJJ</td>
                    <td>Rp.
                      @php
                        $BiayaAdm     = $NJKB->TipeKendaraan->Golongan->biaya_adm;
                        $BiayaSWDKLJJ = $NJKB->TipeKendaraan->Golongan->biaya_sw+$BiayaAdm;
                        $TotalSWDKLJJ = ($BiayaSWDKLJJ)*($DiffMasaLakuTahun);
                      @endphp
                      @if ($Mati)
                        @php
                          $TotalSWDKLJJ = ($BiayaSWDKLJJ)*($DiffMasaLakuTahun);
                        @endphp
                        {{number_format($TotalSWDKLJJ)}}
                        (Rp. {{number_format($BiayaSWDKLJJ)}} per Tahun)
                      @else
                        @php
                          $TotalSWDKLJJ = ($BiayaSWDKLJJ)*($DiffMasaLakuTahun+1);
                        @endphp
                        {{number_format(($BiayaSWDKLJJ)*($DiffMasaLakuTahun+1))}}
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Denda SWDKLJJ</td>
                    <td>Rp.
                      @if ($Mati)
                        @php
                          $DendaSWDKLJJ      = $BiayaSWDKLJJ - $BiayaAdm;
                          $TotalDendaSWDKLJJ = ($DendaSWDKLJJ*(25/100))*$DiffMasaLakuBulan;
                        @endphp
                        {{number_format($TotalDendaSWDKLJJ)}}
                      @else
                        @php
                          $TotalDendaSWDKLJJ = 0;
                        @endphp
                        {{number_format($TotalDendaSWDKLJJ)}}
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Total Bayar</td>
                    @php
                      $TotalBayar = $TotalPKB + $TotalDendaPKB + $TotalSWDKLJJ + $TotalDendaSWDKLJJ;
                    @endphp
                    <td>Rp. {{number_format($TotalBayar)}}</td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="col-md-6">
              {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                <div class="form-group">
                  <label class="col-lg-3 control-label">Petugas Terakhir</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="Keterangan" value="{{$Transaksi->user_id == '0' ? '-' : $Transaksi->User->nama}}" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Keterangan Sebelumnya</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="Keterangan" value="{{$Transaksi->keterangan}}" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Arahkan Ke Bagian</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="Arahan" required autofocus>
                      <option value="" hidden="true"> Pilih </option>
                      <option value="1" {{Auth::User()->tipe == '1' ? 'hidden="true"' : ''}}> Pelayanan </option>
                      <option value="2" {{Auth::User()->tipe == '2' ? 'hidden="true"' : ''}}> Jasa Raharja </option>
                      @if (Auth::User()->tipe == '2')
                        <option value="3"> Kasir </option>
                      @endif
                      <option value="4"> Master </option>
                      @if (Auth::User()->tipe == '3')
                        <option value="5"> Selesai </option>
                      @endif
                      <option value="6"> Batalkan Pendaftaran </option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Keterangan</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="Keterangan" value="{{old('Keterangan')}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label"></label>
                  <div class="row">
                    <div class="col-md-3">
                      <button type="submit" class="btn btn-block btn-info btn">
                        <i class="fa fa-save"></i> <b>Simpan</b>
                      </button>
                    </div>
                    <div class="col-md-3">
                      <button type="reset" class="btn btn-block btn-danger btn">
                        <i class="fa fa-times"></i> <b>Reset</b>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="box box-success box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Berkas</h3>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <img src="/Image-Transaksi/KTP/{{$Transaksi->foto_ktp}}" style="max-width:33%;" data-toggle="modal" data-target="#modal-ktp">
                    <img src="/Image-Transaksi/STNK/{{$Transaksi->foto_stnk}}" style="max-width:33%;" data-toggle="modal" data-target="#modal-stnk">
                    <img src="/Image-Transaksi/Pajak/{{$Transaksi->foto_pajak}}" style="max-width:33%;" data-toggle="modal" data-target="#modal-pajak">
                  </div>
                  <!-- /.box-body -->
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
  <div class="modal fade" id="modal-ktp">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Berkas KTP</h4>
        </div>
        <div class="modal-body">
          <img src="/Image-Transaksi/KTP/{{$Transaksi->foto_ktp}}" style="max-width:100%; max-heigh:323px;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="modal-stnk">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Berkas STNK</h4>
        </div>
        <div class="modal-body">
          <img src="/Image-Transaksi/STNK/{{$Transaksi->foto_stnk}}" style="max-width:100%; max-heigh:323px;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="modal-pajak">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Berkas Pajak</h4>
        </div>
        <div class="modal-body">
          <img src="/Image-Transaksi/Pajak/{{$Transaksi->foto_pajak}}" style="max-width:100%; max-heigh:323px;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection
