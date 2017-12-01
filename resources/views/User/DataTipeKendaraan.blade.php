@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Data Tipe Kendaraan
        @endsection
        Data Tipe Kendaraan
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
            <a href="/tipe-kendaraan/tambah">
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
              <th>Merk</th>
              <th>Tipe</th>
              <th>Golongan</th>
              <th style="text-align:center; max-width:50%;">Ubah</th>
              <th style="text-align:center; max-width:50%;">Hapus</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($TipeKendaraan as $DataTipeKendaraan)
                <tr>
                  <td>{{$no+=1}}</td>
                  <td>{{$DataTipeKendaraan->MerkKendaraan->merk}}</td>
                  <td>{{$DataTipeKendaraan->tipe}}</td>
                  <td>{{$DataTipeKendaraan->Golongan->golongan}}</td>
                  <td class="col-md-2">
                      <button type="button" class="btn btn-block btn-primary btn-flat" onclick="Ubah('{{Crypt::encryptString($DataTipeKendaraan->id)}}','{{$DataTipeKendaraan->tipe}}')"><b><i class="fa fa-edit"></i> Ubah</b></button>
                  </td>
                  <td class="col-md-2">
                      <button type="button" class="btn btn-block btn-danger btn-flat" onclick="Hapus('{{Crypt::encryptString($DataTipeKendaraan->id)}}','{{$DataTipeKendaraan->tipe}}')"><b><i class="fa fa-trash-o"></i> Hapus</b></button>
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
  function Ubah(id,Merk)
  {
    swal({
      title   : "Edit",
      text    : "Anda Akan di Arahkan ke Halaman Ubah Data Merk '"+Merk+"'",
      icon    : "info",
    })
    window.location = "/tipe-kendaraan/"+id+"/edit";
  }

  function Hapus(id,Merk)
  {
    swal({
      title   : "Hapus",
      text    : "Yakin Ingin Menghapus Data Merk '"+Merk+"' ?",
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
          text   : "Data Merk '"+Merk+"' Akan di Hapus",
          icon   : "info",
          timer  : 2500,
        });
        window.location = "/tipe-kendaraan/"+id+"/hapus";
      } else {
        swal({
          title  : "Batal Hapus",
          text   : "Data Merk '"+Merk+"' Batal di Hapus",
          icon   : "info",
          timer  : 2500,
        })
      }
    });
  }
</script>
