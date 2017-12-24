@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Data NJKB
        @endsection
        Data NJKB
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
            <a href="/njkb-kendaraan/tambah">
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
              <th>Tahun Buat</th>
              <th>NJKB</th>
              <th>Bobot</th>
              <th>Dasar PKB</th>
              <th>Jumlah Kendaraan</th>
              <th style="text-align:center; max-width:50%;">Ubah</th>
              <th style="text-align:center; max-width:50%;">Hapus</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($NJKB as $DataNJKB)
                <tr>
                  <td>{{$no+=1}}</td>
                  <td>{{$DataNJKB->MerkKendaraan->merk}}</td>
                  <td>{{$DataNJKB->TipeKendaraan->tipe}}</td>
                  <td>{{$DataNJKB->tahun_buat}}</td>
                  <td>Rp. {{number_format($DataNJKB->NJKB)}}</td>
                  <td>{{number_format($DataNJKB->bobot, 3)}}</td>
                  <td>Rp. {{number_format($DataNJKB->NJKB*$DataNJKB->bobot)}}</td>
<<<<<<< HEAD
                  <td>{{count($DataNJKB->Kendaraan)}}</td>
=======
                  <td>Belum Becoding</td>
>>>>>>> ea2daf11df1dea958e3d4e63eb5e25396949c572
                  <td class="col-md-2">
                      <button type="button" class="btn btn-block btn-primary btn-flat" onclick="Ubah('{{Crypt::encryptString($DataNJKB->id)}}','{{$DataNJKB->TipeKendaraan->tipe}}')"><b><i class="fa fa-edit"></i> Ubah</b></button>
                  </td>
                  <td class="col-md-2">
                      <button type="button" class="btn btn-block btn-danger btn-flat"
<<<<<<< HEAD
                              onclick="{{count($DataNJKB->Kendaraan) != 0 ? 'cantHapus' : 'Hapus'}}('{{Crypt::encryptString($DataNJKB->id)}}','{{$DataNJKB->TipeKendaraan->tipe}}')"><b><i class="fa fa-trash-o"></i> Hapus</b></button>
=======
                              onclick="{{count($DataNJKB->TipeKendaraan) != 0 ? 'cantHapus' : 'Hapus'}}('{{Crypt::encryptString($DataNJKB->id)}}','{{$DataNJKB->TipeKendaraan->tipe}}')"><b><i class="fa fa-trash-o"></i> Hapus</b></button>
>>>>>>> ea2daf11df1dea958e3d4e63eb5e25396949c572
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
