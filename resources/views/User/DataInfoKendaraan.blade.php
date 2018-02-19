@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Info Kendaraan
        @endsection
        Info Kendaraan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
        <div class="box-header">
        </div>
        <div class="box-body">
          {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            {{-- <div class="form-group"> --}}
              {{-- <label class="col-lg-3 control-label">Nomor Polisi</label> --}}
              <div class="col-lg-12 input-group input-group-lg">
                <select class="form-control" name="method" required autofocus>
                  <option value="" hidden="true">Pilih Metode</option>
                  <option value="NoPlat">Nomor Plat</option>
                  <option value="NoMesin">Nomor Mesin</option>
                  <option value="NoRangka">Nomor Rangka</option>
                </select>
              </div>
              <br>
              <div class="col-lg-12 input-group input-group-lg">
                <input class="form-control" type="text" name="NoPlat" value="{{old('NoPlat')}}" placeholder="Masukan Data" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-info-circle"></i> <b>Cek Info</b></button>
                </span>
              </div>
            {{-- </div> --}}
          </form>
        </div>
            <!-- /.box-body -->
      </div>
    </section>
  </div>
@endsection
