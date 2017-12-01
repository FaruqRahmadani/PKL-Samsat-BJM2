@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Edit NJKB
        @endsection
        Edit NJKB
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
        <div class="box-header">
          <div class="col-md-2">
            <a href="/njkb-kendaraan">
              <button type="button" class="btn btn-block btn-info">
                <i class="fa fa-chevron-left"></i> <b>Kembali</b>
              </button>
            </a>
          </div>
        </div>
        <div class="box-body">
          {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="form-group">
              <label class="col-lg-3 control-label">Merk Kendaraan</label>
              <div class="col-lg-8">
                <select class="form-control" name="idMerkKendaraan" id="merk" required>
                  <option value="" hidden="true"> Pilih Merk </option>
                  @foreach ($MerkKendaraan as $DataMerkKendaraan)
                    <option value="{{$DataMerkKendaraan->id}}" {{$NJKB->merk_kendaraan_id == $DataMerkKendaraan->id ? 'selected' : ''}}>{{$DataMerkKendaraan->merk}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Tipe Kendaraan</label>
              <div class="col-lg-8">
                <select class="form-control" name="idTipeKendaraan" id="tipe" required>
                  @foreach ($TipeKendaraan as $DataTipeKendaraan)
                    <option value="{{$DataTipeKendaraan->id}}" {{$NJKB->tipe_kendaraan_id == $DataTipeKendaraan->id ? 'selected' : ''}}>{{$DataTipeKendaraan->tipe}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Tahun Buat</label>
              <div class="col-lg-8">
                <input class="form-control" type="number" name="TahunBuat" value="{{$NJKB->tahun_buat}}" required min="1500">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">NJKB</label>
              <div class="col-lg-8">
                <input class="form-control" type="number" name="NJKB" value="{{$NJKB->NJKB}}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Bobot</label>
              <div class="col-lg-8">
                <input class="form-control" type="number" name="Bobot" value="{{number_format($NJKB->bobot,3)}}" required step="any">
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
  <script>
    $('#merk').change(function()
    {
      $.get('/json-tipe/tipe/'+this.value+'/tipes.json', function(tipes)
      {
        var $tipe = $('#tipe');

        $tipe.find('option').remove().end();
        $tipe.append('<option value="" hidden>Pilih Tipe</option>');

        $.each(tipes, function(index, tipe) {
          $tipe.append('<option value="' + tipe.id + '">' + tipe.tipe + '</option>');
        });
      });
    });

    $(document).ready(function() {
      $(".merk option[value='0']").attr("disabled","disabled");
      $(".tipe option[value='0']").attr("disabled","disabled");
    });
  </script>
@endsection
