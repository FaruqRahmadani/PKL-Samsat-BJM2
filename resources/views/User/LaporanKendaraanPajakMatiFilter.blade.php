@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Laporan Kendaraan Pajak Mati
        @endsection
        Laporan Kendaraan Pajak Mati
      </h1>
    </section>
    {{-- ALERT !!! --}}
    <script>
      @if (session('success'))
      swal({
        title   : "Berhasil",
        text    : "{{session('success')}}",
        icon    : "success",
      })
      @endif
    </script>
    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
        <div class="box-header">
          <div class="col-md-12">
            {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="form-group">
              <div class="col-lg-2">
                <div style="text-align: center;">
                  Tanggal Awal
                </div>
                <input class="form-control" type="date" value="{{Carbon\Carbon::parse($TanggalAwal)->format('Y-m-d')}}" name="TanggalAwal" value="{{old('TanggalAwal')}}">
              </div>
              <div class="col-lg-2">
                <div style="text-align: center;">
                  Tanggal Akhir
                </div>
                <input class="form-control" type="date" value="{{Carbon\Carbon::parse($TanggalAkhir)->format('Y-m-d')}}" name="TanggalAkhir" value="{{old('TanggalAkhir')}}">
              </div>
              <div class="col-lg-2">
                  <div style="text-align: center;">
                    <br>
                  </div>
                  <button type="submit" class="btn btn-block btn-info">
                  <i class="fa fa-filter"></i> <b>Filter</b>
                </button>
              </div>
            </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              @php
                $no = 0;
              @endphp
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Nomor Polisi</th>
              <th>Potensi PKB</th>
              <th>Potensi Denda PKB</th>
              <th>Potensi SWDKLJJ</th>
              <th>Potensi Denda SWDKLJJ</th>
              <th>Masa Laku</th>
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
                  <td>{{$no+=1}}</td>
                  <td>{{$DataKendaraan->nama}}</td>
                  <td>{{$DataKendaraan->noplat}}</td>
                  <td>Rp. {{number_format($PKB)}}</td>
                  <td>Rp. {{number_format($DendaPKB)}}</td>
                  <td>Rp. {{number_format($SWDKLJJ)}}</td>
                  <td>Rp. {{number_format($DendaSWDKLJJ)}}</td>
                  <td>{{Carbon\Carbon::parse($DataKendaraan->masalaku)->format('d-m-Y')}}</td>
                </tr>
              @endforeach
          </table>
          <div class="col-md-2 pull-right">
            <a href="/laporan-kendaraan-pajak-mati/{{$TanggalAwal}}/{{$TanggalAkhir}}/print" target="_blank">
              <button type="button" class="btn btn-block btn-primary">
                <i class="fa fa-print"></i> <b>Cetak</b>
              </button>
            </a>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div>
@endsection

<script>
  function Ubah(id,TipeKendaraan)
  {
    swal({
      title   : "Edit",
      text    : "Anda Akan di Arahkan ke Halaman Ubah Data NJKB '"+TipeKendaraan+"'",
      icon    : "info",
    })
    window.location = "/njkb-kendaraan/"+id+"/edit";
  }

  function Hapus(id,TipeKendaraan)
  {
    swal({
      title   : "Hapus",
      text    : "Yakin Ingin Menghapus Data NJKB '"+TipeKendaraan+"' ?",
      icon    : "warning",
      buttons : [
        "Batal",
        "Hapus",
      ],
    })
    .then((hapus) => {
      if (hapus) {
        swal({
          title  : "Hapus",
          text   : "Data NJKB '"+TipeKendaraan+"' Akan di Hapus",
          icon   : "info",
          timer  : 2500,
        });
        window.location = "/njkb-kendaraan/"+id+"/hapus";
      } else {
        swal({
          title  : "Batal Hapus",
          text   : "Data NJKB '"+TipeKendaraan+"' Batal di Hapus",
          icon   : "info",
          timer  : 2500,
        })
      }
    });
  }

  function cantHapus(id,TipeKendaraan)
  {
    swal({
      title   : "Hapus",
      text    : "Data NJKB '"+TipeKendaraan+"' Tidak dapat di Hapus Karena Ada Data Kendaraan",
      icon    : "warning",
    })
  }
</script>
