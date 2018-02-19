@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Data TNKB
        @endsection
        Data TNKB
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
            <a href="/jenis-tnkb/tambah">
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
              <th>Jenis TNKB</th>
              <th style="width:20%; max-width:20%">Bobot</th>
              <th style="text-align:center; max-width:50%;">Ubah</th>
              <th style="text-align:center; max-width:50%;">Hapus</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($JenisTNKB as $DataJenisTNKB)
                <tr>
                  <td>{{$no+=1}}</td>
                  <td>{{$DataJenisTNKB->jenis_tnkb}}</td>
                  <td>{{$DataJenisTNKB->bobot}}%</td>
                  <td class="col-md-2">
                      <button type="button" class="btn btn-block btn-primary btn-flat" onclick="Ubah('{{Crypt::encryptString($DataJenisTNKB->id)}}','{{$DataJenisTNKB->jenis_tnkb}}')"><b><i class="fa fa-edit"></i> Ubah</b></button>
                  </td>
                  <td class="col-md-2">
                      <button type="button" class="btn btn-block btn-danger btn-flat"
                              onclick="{{count($DataJenisTNKB->TipeKendaraan) != 0 ? 'cantHapus' : 'Hapus'}}('{{Crypt::encryptString($DataJenisTNKB->id)}}','{{$DataJenisTNKB->jenis_tnkb}}')"><b><i class="fa fa-trash-o"></i> Hapus</b></button>
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
  function Ubah(id,jenisTNKB)
  {
    swal({
      title   : "Edit",
      text    : "Anda Akan di Arahkan ke Halaman Ubah Data TNKB '"+jenisTNKB+"'",
      icon    : "info",
    })
    window.location = "/jenis-tnkb/"+id+"/edit";
  }

  function Hapus(id,jenisTNKB)
  {
    swal({
      title   : "Hapus",
      text    : "Yakin Ingin Menghapus Data Merk '"+jenisTNKB+"' ?",
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
          text   : "Data Merk '"+jenisTNKB+"' Akan di Hapus",
          icon   : "info",
          timer  : 2500,
        });
        window.location = "/jenis-tnkb/"+id+"/hapus";
      } else {
        swal({
          title  : "Batal Hapus",
          text   : "Data Merk '"+jenisTNKB+"' Batal di Hapus",
          icon   : "info",
          timer  : 2500,
        })
      }
    });
  }

  function cantHapus(id,jenisTNKB)
  {
    swal({
      title   : "Hapus",
      text    : "Data Merk '"+jenisTNKB+"' Tidak dapat di Hapus Karena Ada Data Tipe Kendaraan",
      icon    : "warning",
    })
  }
</script>
