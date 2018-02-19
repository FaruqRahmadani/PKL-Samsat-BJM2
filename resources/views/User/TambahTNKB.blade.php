@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Tambah TNKB
        @endsection
        Tambah TNKB
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
        <div class="box-header">
          <div class="col-md-2">
            <a href="/jenis-tnkb">
              <button type="button" class="btn btn-block btn-info">
                <i class="fa fa-chevron-left"></i> <b>Kembali</b>
              </button>
            </a>
          </div>
        </div>
        <div class="box-body">
          {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="form-group">
              <label class="col-lg-3 control-label">Jenis TNKB</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="JenisTNKB" value="{{old('JenisTNKB')}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Bobot</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input class="form-control" type="number" name="Bobot" value="{{old('Bobot')}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" step="any">
                  <span class="input-group-addon">%</span>
                </div>
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
