@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Laporan Registrasi Batal
        @endsection
        Laporan Registrasi Batal
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
                <input class="form-control" type="date" value="{{Carbon\Carbon::now()->firstOfMonth()->format('Y-m-d')}}" name="TanggalAwal" value="{{old('TanggalAwal')}}">
              </div>
              <div class="col-lg-2">
                <div style="text-align: center;">
                  Tanggal Akhir
                </div>
                <input class="form-control" type="date" value="{{Carbon\Carbon::now()->lastOfMonth()->format('Y-m-d')}}" name="TanggalAkhir" value="{{old('TanggalAkhir')}}">
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
            <div class="callout callout-info">
              <p style="text-align:center;">Data Registrasi Batal Keseluruhan</p>
            </div>
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
              <th>Jenis TNKB</th>
              <th>Waktu Daftar</th>
              <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($Transaksi as $DataTransaksi)
                <tr>
                  <td>{{$no+=1}}</td>
                  <td>{{$DataTransaksi->Kendaraan->nama}}</td>
                  <td>{{$DataTransaksi->Kendaraan->noplat}}</td>
                  <td>{{$DataTransaksi->Kendaraan->JenisTNKB->jenis_tnkb}}</td>
                  <td>{{Carbon\Carbon::parse($DataTransaksi->created_at)->format('d-m-Y H:i A')}}</td>
                  <td>{{$DataTransaksi->keterangan}}</td>
                </tr>
              @endforeach
          </table>
          <div class="col-md-2 pull-right">
            <a href="/laporan-registrasi-batal/print" target="_blank">
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
