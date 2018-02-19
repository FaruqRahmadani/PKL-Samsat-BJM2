@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Edit Golongan Kendaraan
        @endsection
        Edit Golongan Kendaraan - {{$Golongan->golongan}}
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
        <div class="box-header">
          <div class="col-md-2">
            <a href="/golongan-kendaraan">
              <button type="button" class="btn btn-block btn-info">
                <i class="fa fa-chevron-left"></i> <b>Kembali</b>
              </button>
            </a>
          </div>
        </div>
        <div class="box-body">
          {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Golongan</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="NamaGolongan" value="{{$Golongan->golongan}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Keterangan</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="Keterangan" value="{{$Golongan->keterangan}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Biaya Santunan Wajib Jasa Raharja</label>
              <div class="col-lg-8">
                <input class="form-control" type="number" name="SantunanWajib" value="{{$Golongan->biaya_sw}}" required  min=0>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Biaya Administrasi</label>
              <div class="col-lg-8">
                <input class="form-control" type="number" name="BiayaAdmin" value="{{$Golongan->biaya_adm}}" required  min=0>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="row">
                <div class="col-md-2">
                  <button type="submit" class="btn btn-block btn-info btn">
                    <i class="fa fa-save"></i> <b>Simpan</b>
                  </button>
                </div>
                <div class="col-md-2">
                  <button type="reset" class="btn btn-block btn-danger btn">
                    <i class="fa fa-times"></i> <b>Reset</b>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
            <!-- /.box-body -->
      </div>
    </section>
  </div>
@endsection
