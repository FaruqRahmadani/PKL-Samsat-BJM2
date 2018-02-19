@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Laporan Kendaraan
        @endsection
        Laporan Kendaraan
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
                  Golongan
                </div>
                <select class="form-control" name="idGolongan" required>
                  <option value="0">Semua</option>
                  @foreach ($Golongan as $DataGolongan)
                    <option value="{{$DataGolongan->id}}" {{$idGolongan == $DataGolongan->id ? 'selected' : ''}}>{{$DataGolongan->golongan}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-lg-2">
                <div style="text-align: center;">
                  Merk Kendaraan
                </div>
                <select class="form-control" name="idMerk" required>
                  <option value="0">Semua</option>
                  @foreach ($MerkKendaraan as $DataMerkKendaraan)
                    <option value="{{$DataMerkKendaraan->id}}" {{$DataMerkKendaraan->id == $idMerk ? 'selected' : ''}}>{{$DataMerkKendaraan->merk}}</option>
                  @endforeach
                </select>
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
              <th>Golongan</th>
              <th>Merk Kendaraan</th>
              <th>Tipe Kendaraan</th>
              <th>Daerah UPPD</th>
              <th>Masa Laku</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($Kendaraan as $DataKendaraan)
                <tr>
                  <td>{{$no+=1}}</td>
                  <td>{{$DataKendaraan->nama}}</td>
                  <td>{{$DataKendaraan->noplat}}</td>
                  <td>{{$DataKendaraan->NJKB->TipeKendaraan->Golongan->golongan}}</td>
                  <td>{{$DataKendaraan->NJKB->MerkKendaraan->merk}}</td>
                  <td>{{$DataKendaraan->NJKB->TipeKendaraan->tipe}}</td>
                  <td>{{$DataKendaraan->DaerahUPPD->nama_daerah}}</td>
                  <td>{{Carbon\Carbon::parse($DataKendaraan->masalaku)->format('d-m-Y')}}</td>
                </tr>
              @endforeach
          </table>
          <div class="col-md-2 pull-right">
            <a href="/laporan-kendaraan/{{$idGolongan}}/{{$idMerk}}/print" target="_blank">
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
