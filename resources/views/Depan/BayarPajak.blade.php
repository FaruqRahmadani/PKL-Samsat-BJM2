@extends('Depan.Layouts.Masters')
@section('content')

    <section id="infopajak">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Bayar Pajak Tahunan</h2>
            <h4 class="section-heading">{{$NoPlat}}</h4>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="col-lg-4 mx-auto text-center">
          {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            {{csrf_field()}}
            <div class="form-group has-feedback">
              <label class="col-lg-12 control-label">Foto KTP Pemilik</label>
              <input type="file" name="foto_ktp" class="form-control" required accept='image/*'>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <label class="col-lg-12 control-label">Foto STNK</label>
              <input type="file" class="form-control" name="foto_stnk" required accept='image/*'>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <label class="col-lg-12 control-label">Foto Notice Pajak</label>
              <input type="file" class="form-control" name="foto_pajak" required accept='image/*'>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-lg-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
      </div>
    </section>

@endsection
