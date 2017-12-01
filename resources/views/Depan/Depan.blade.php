@extends('Depan.Layouts.Masters')
@section('content')
  <script>
    @if (session('success'))
    swal({
      title   : "Berhasil",
      text    : "{{session('success')}}",
      icon    : "success",
    })
    @endif
  </script>
    <header class="masthead text-center text-white d-flex" style="background-image: url(/Public-Depan/Image/Slide/1.jpg);">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>UNIT PELAYANAN PENDAPATAN DAERAH</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <h3 class="text-uppercase">
              <strong>SISTEM ADMINISTRASI MANUNGGAL SATU ATAP</strong>
            </h1>
          </div>
        </div>
      </div>
    </header>

    <section id="infopajak">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Info Pajak</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="col-lg-4 mx-auto text-center">
          <form action="/info-pajak" method="post">
            {{csrf_field()}}
            @if (session('warning'))
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{session('warning')}}
              </div>
            @endif
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Nomor Plat" name="NomorPlat" value={{old('NomorPlat')}}>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-lg-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
      </div>
    </section>

    <section id="cekStatus" class="bg-dark text-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Cek Status</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="col-lg-4 mx-auto text-center">
          <form action="/cek-status" method="post">
            {{csrf_field()}}
            @if (session('warning'))
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{session('warning')}}
              </div>
            @endif
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Nomor Plat" name="NomorPlat" value={{old('NomorPlat')}}>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-lg-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
      </div>
    </section>

  @if (isset($InfoPajak))
    <a class="nav-link js-scroll-trigger" href="#TampilInfoPajak">
      <button title="Go to top" style="
                      position: fixed;
                      bottom: 20px;
                      right: 30px;
                      z-index: 99;
                      border: none;
                      outline: none;
                      background-color: red;
                      color: white;
                      cursor: pointer;
                      padding: 15px;
                      border-radius: 10px;">
              Info Pajak Anda
      </button>
    </a>
    <section id="TampilInfoPajak">
      {{-- <div class="container"> --}}
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Info Pajak - {{$Kendaraan->noplat}}</h2>
            <hr class="my-4">
          </div>
        </div>
      {{-- </div> --}}
      <div class="container">
        <div class="col-lg-10 mx-auto text-center">
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover" style="text-align:left;">
              <tr>
                <td style="width:35%;">Nomor Polisi</td>
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
                      $DiffMasaLakuTahun = 1;
                      $DiffMasaLakuBulan = 1;
                    @endphp
                    <span class="pull badge bg-blue">Pajak Hidup</span>
                  @else
                    @php
                      $Mati = true;
                      $DiffMasaLakuTahun = (Carbon\Carbon::now()->diffInYears(Carbon\Carbon::parse($Kendaraan->masalaku))+1);
                      $DiffMasaLakuBulan = floor(((Carbon\Carbon::now()->diffInMonths(Carbon\Carbon::parse($Kendaraan->masalaku)) )/3)+1);
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
                    if ($Mati) {
                      $TotalPKB = $BiayaPKB*($DiffMasaLakuTahun+1);
                    }else{
                      $TotalPKB = $BiayaPKB*($DiffMasaLakuTahun);
                    }
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
                    $BiayaAdm     = $TipeKendaraan->Golongan->biaya_adm;
                    $BiayaSWDKLJJ = $TipeKendaraan->Golongan->biaya_sw+$BiayaAdm;
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
                      $TotalSWDKLJJ = ($BiayaSWDKLJJ)*($DiffMasaLakuTahun);
                    @endphp
                    {{number_format(($BiayaSWDKLJJ)*($DiffMasaLakuTahun))}}
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
                  $PKB = $TotalPKB + $TotalDendaPKB;
                  $SWDKLJJ = $TotalSWDKLJJ + $TotalDendaSWDKLJJ;
                  $TotalBayar = $TotalPKB + $TotalDendaPKB + $TotalSWDKLJJ + $TotalDendaSWDKLJJ;
                @endphp
                <td>Rp. {{number_format($TotalBayar)}}</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-lg-12">
          @php
            $DiffBulan = Carbon\Carbon::now()->diffInMonths(Carbon\Carbon::parse($Kendaraan->masalaku));
            if (Carbon\Carbon::now() > Carbon\Carbon::parse($Kendaraan->masalaku)) {
              $DiffBulan = $DiffBulan*-1;
            }
          @endphp
          @if ($DiffBulan > 3)
            <button class="btn btn-primary btn-block btn-flat">Belum Saatnya Bayar Pajak 1 Tahun</button>
          @elseif ($Total == 0)
            <a href="/bayar/tahunan/{{$Kendaraan->noplat}}/{{Crypt::encryptString($PKB)}}/{{Crypt::encryptString($SWDKLJJ)}}">
              <button class="btn btn-primary btn-block btn-flat">Bayar Pajak 1 Tahun</button>
            </a>
          @else
            <button class="btn btn-primary btn-block btn-flat" disabled>Sudah Terdaftar Bayar Pajak Tahunan</button>
          @endif

        </div>
      </div>
    </section>
  @endif

  @if (isset($cekStatus))
    <a class="nav-link js-scroll-trigger" href="#CekStatus">
      <button title="Go to top" style="
                      position: fixed;
                      bottom: 20px;
                      right: 30px;
                      z-index: 99;
                      border: none;
                      outline: none;
                      background-color: red;
                      color: white;
                      cursor: pointer;
                      padding: 15px;
                      border-radius: 10px;">
              Status Registrasi Anda
      </button>
    </a>
  <section id="CekStatus">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">Status</h2>
          <h4 class="section-heading">{{$Kendaraan->noplat}}</h4>
          <hr class="my-4">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h3 class="section-heading">Status</h3>
          <h2 class="section-heading" style="color:#ff0000;">{{$Status}}</h2>
          <h3 class="section-heading">Keterangan</h3>
          <h2 class="section-heading" style="color:#ff0000;">{{$Transaksi->keterangan}}</h2>
        </div>
      </div>
    </div>
  </section>
  @endif

    <section id="lokasi" class="bg-dark text-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h2 class="section-heading">Lokasi</h2>
            <hr class="my-4">
            <div id="map" style="width:100%;height:400px"></div>
              <script>
                function initMap() {
                  var uluru = {lat: -3.296700, lng: 114.589964};
                  var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 16,
                    center: uluru
                  });
                  var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                  });
                }
              </script>
              <script async defer
              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqoTpkLgCI7zLb24ipxkLsa8Q01EWQ_d0&callback=initMap">
              </script>
            </div>
          </div>
        </div>
      </div>
    </section>
    @if (isset($Kendaraan))
      <script>
      var elem = $('#Showinfopajak');
      if(elem) {
        $('html').scrollTop(elem.offset().top);
        $('html').scrollLeft(elem.offset().left);
      }
      </script>
    @endif

@endsection
