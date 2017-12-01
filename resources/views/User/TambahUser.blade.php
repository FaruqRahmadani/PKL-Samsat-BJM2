@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Tambah User
        @endsection
        Tambah User
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
        <div class="box-header">
          <div class="col-md-2">
            <a href="/user">
              <button type="button" class="btn btn-block btn-info">
                <i class="fa fa-chevron-left"></i> <b>Kembali</b>
              </button>
            </a>
          </div>
        </div>
        <div class="box-body">
          @if (session('danger'))
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> Perhatian</h4>
              {{session('danger')}}
            </div>
          @endif

          {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="form-group">
              <label class="col-lg-3 control-label">NIP</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="NIP" value="{{old('NIP')}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="Nama" value="{{old('Nama')}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Username</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="Username" value="{{old('Username')}}" required pattern="[a-zA-Z0-9]+.{5,}" title="Minimal 6 Karakter" autofocus>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Password</label>
              <div class="col-lg-8">
                <input class="form-control" type="password" name="Password" value="{{old('Password')}}" required pattern="[a-zA-Z0-9]+.{5,}" title="Minimal 6 Karakter" autofocus>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Tipe</label>
              <div class="col-lg-8">
                <select class="form-control" name="Tipe" required>
                  <option value="" hidden> Pilih </option>
                  <option value="1" {{old('Tipe') == 1 ? 'selected' : ''}}> Pelayanan </option>
                  <option value="2" {{old('Tipe') == 2 ? 'selected' : ''}}> Jasa Raharja </option>
                  <option value="3" {{old('Tipe') == 3 ? 'selected' : ''}}> Kasir </option>
                  <option value="4" {{old('Tipe') == 4 ? 'selected' : ''}}> Master </option>
                  <option value="0"> Suspend </option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Foto</label>
              <div class="col-lg-8">
                <input class="form-control" type="file" name="Foto" value="{{old('Foto')}}" title="Isi Jika diperlukan" accept="image/jpeg">
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
