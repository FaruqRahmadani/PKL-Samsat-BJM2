@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Data User
        @endsection
        Data User
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
            <a href="/user/tambah">
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
              <th>NIP</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Tipe</th>
              <th style="text-align:center; max-width:50%;">Ubah</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($User as $DataUser)
                @php
                switch ($DataUser->tipe) {
                  case '1':
                    $Status = 'Pelayanan';
                    $warna  = 'green';
                    break;

                  case '2':
                    $Status = 'Jasa Raharja';
                    $warna  = 'blue';
                    break;

                  case '3':
                    $Status = 'Kasir';
                    $warna  = 'yellow';
                    break;

                  case '4':
                    $Status = 'Master';
                    $warna  = 'purple';
                    break;

                  default:
                    $Status = 'Suspend';
                    $warna  = 'red';
                    break;
                }
                @endphp
                <tr>
                  <td>{{$no+=1}}</td>
                  <td>{{$DataUser->nip}}</td>
                  <td>{{$DataUser->nama}}</td>
                  <td>{{$DataUser->username}}</td>
                  <td>
                    <span class="pull-right-container">
                      <small class="label pull-left bg-{{$warna}}">{{$Status}}</small>
                    </span>
                  </td>
                  <td class="col-md-2">
                      <button type="button" class="btn btn-block btn-primary btn-flat" onclick="Ubah('{{Crypt::encryptString($DataUser->id)}}','{{$DataUser->nama}}')"><b><i class="fa fa-edit"></i> Ubah</b></button>
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
  function Ubah(id,namaUser)
  {
    swal({
      title   : "Edit",
      text    : "Anda Akan di Arahkan ke Halaman Ubah Data User '"+namaUser+"'",
      icon    : "info",
    })
    window.location = "/user/"+id+"/edit";
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
