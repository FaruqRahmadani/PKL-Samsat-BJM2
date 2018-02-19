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
        Data Kendaraan
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
          <div class="col-md-2">
            <a href="/kendaraan/tambah">
              <button type="button" class="btn btn-block btn-info">
                <i class="fa fa-plus"></i> <b>Tambah Data</b>
              </button>
            </a>
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
              <th>No Plat</th>
              <th>Nama</th>
              <th>Jenis Plat</th>
              <th>No Rangka</th>
              <th>No Mesin</th>
              <th>Daerah</th>
              <th>Masa Laku</th>
              <th>Status</th>
              <th style="text-align:center; max-width:50%;">Ubah</th>
              <th style="text-align:center; max-width:50%;">Hapus</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($Kendaraan as $DataKendaraan)
                <tr>
                  <td>{{$no+=1}}</td>
                  <td>
                    <a href="/kendaraan/{{$DataKendaraan->noplat}}/detail">
                      {{$DataKendaraan->noplat}}
                    </a>
                  </td>
                  <td>{{$DataKendaraan->nama}}</td>
                  <td>{{$DataKendaraan->JenisTNKB->jenis_tnkb}}</td>
                  <td>{{$DataKendaraan->no_rangka}}</td>
                  <td>{{$DataKendaraan->no_mesin}}</td>
                  <td>{{$DataKendaraan->DaerahUPPD->nama_daerah}}</td>
                  <td>{{Carbon\Carbon::parse($DataKendaraan->masalaku)->format('d-m-Y')}}</td>
                  <td>
                    @if (Carbon\Carbon::parse($DataKendaraan->masalaku)->format('Y-m-d') >= Carbon\Carbon::now()->format('Y-m-d'))
                      <span class="pull badge bg-blue">Pajak Hidup</span>
                    @else
                      <span class="pull badge bg-red">Pajak Mati</span>
                    @endif
                  </td>
                  <td class="col-md-1">
                      <button type="button" class="btn btn-block btn-primary btn-flat" onclick="Ubah('{{Crypt::encryptString($DataKendaraan->id)}}','{{$DataKendaraan->noplat}}')"><b><i class="fa fa-edit"></i> Ubah</b></button>
                  </td>
                  <td class="col-md-1">
                      <button type="button" class="btn btn-block btn-danger btn-flat"
                              onclick="Hapus('{{Crypt::encryptString($DataKendaraan->id)}}','{{$DataKendaraan->noplat}}')"><b><i class="fa fa-trash-o"></i> Hapus</b></button>
                  </td>
                </tr>
              @endforeach
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div>
@endsection

<script>
  function Ubah(id,NoPlat)
  {
    swal({
      title   : "Edit",
      text    : "Anda Akan di Arahkan ke Halaman Ubah Data Kendaraan '"+NoPlat+"'",
      icon    : "info",
    })
    window.location = "/kendaraan/"+id+"/edit";
  }

  function Hapus(id,NoPlat)
  {
    swal({
      title   : "Hapus",
      text    : "Yakin Ingin Menghapus Data Merk '"+NoPlat+"' ?",
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
          text   : "Data Merk '"+NoPlat+"' Akan di Hapus",
          icon   : "info",
          timer  : 2500,
        });
        window.location = "/merk-kendaraan/"+id+"/hapus";
      } else {
        swal({
          title  : "Batal Hapus",
          text   : "Data Merk '"+NoPlat+"' Batal di Hapus",
          icon   : "info",
          timer  : 2500,
        })
      }
    });
  }

  function cantHapus(id,NoPlat)
  {
    swal({
      title   : "Hapus",
      text    : "Data Merk '"+NoPlat+"' Tidak dapat di Hapus Karena Ada Data Tipe Kendaraan",
      icon    : "warning",
    })
  }
</script>
