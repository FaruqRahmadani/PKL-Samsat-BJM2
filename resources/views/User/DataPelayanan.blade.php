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
        Data Pelayanan
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
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              @php
                $no = 0;
              @endphp
            <tr>
              <th>#</th>
              <th>Nomor Plat</th>
              <th>Masa Laku</th>
              <th>Total Bayar</th>
              <th>Waktu Daftar</th>
              <th>Info</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($Transaksi as $DataTransaksi)
                <tr>
                  <td>{{$no+=1}}</td>
                  <td>{{$DataTransaksi->Kendaraan->noplat}}</td>
                  <td>{{$DataTransaksi->Kendaraan->masalaku}}</td>
                  <td>Rp. {{number_format($DataTransaksi->pkb+$DataTransaksi->swdkljj)}}</td>
                  <td>{{Carbon\Carbon::parse($DataTransaksi->created_at)->format('d-m-Y H:i A')}}</td>
                  <td style="width:75px">
                    <a href="/pelayanan/{{Crypt::encryptString($DataTransaksi->id)}}">
                      <button type="button" class="btn btn-block btn-info btn-flat"><b><i class="fa fa-info-circle"></i> Info</b></button>
                    </a>
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
