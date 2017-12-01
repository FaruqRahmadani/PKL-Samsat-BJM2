@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Data Merk Kendaraan
        @endsection
        Data Merk Kendaraan
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
            <a href="/merk-kendaraan/tambah">
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
              <th style="width:20%; max-width:20%">Jumlah Tipe Kendaraan</th>
              <th style="text-align:center; max-width:50%;">Ubah</th>
              <th style="text-align:center; max-width:50%;">Hapus</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($MerkKendaraan as $DataMerkKendaraan)
                <tr>
                  <td>{{$no+=1}}</td>
                  <td>{{$DataMerkKendaraan->merk}}</td>
                  <td>{{count($DataMerkKendaraan->TipeKendaraan)}}</td>
                  <td class="col-md-2">
                      <button type="button" class="btn btn-block btn-primary btn-flat" onclick="Ubah('{{Crypt::encryptString($DataMerkKendaraan->id)}}','{{$DataMerkKendaraan->Merk}}')"><b><i class="fa fa-edit"></i> Ubah</b></button>
                  </td>
                  <td class="col-md-2">
                      <button type="button" class="btn btn-block btn-danger btn-flat"
                              onclick="{{count($DataMerkKendaraan->TipeKendaraan) != 0 ? 'cantHapus' : 'Hapus'}}('{{Crypt::encryptString($DataMerkKendaraan->id)}}','{{$DataMerkKendaraan->merk}}')"><b><i class="fa fa-trash-o"></i> Hapus</b></button>
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
    window.location = "/merk-kendaraan/"+id+"/edit";
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
        window.location = "/merk-kendaraan/"+id+"/hapus";
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

  function cantHapus(id,merk)
  {
    swal({
      title   : "Hapus",
      text    : "Data Merk '"+merk+"' Tidak dapat di Hapus Karena Ada Data Tipe Kendaraan",
      icon    : "warning",
    })
  }
</script>
