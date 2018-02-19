@extends('User.Layouts.Master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Ubah Kendaraan
        @endsection
        Ubah Kendaraan - {{$Kendaraan->noplat}}
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
        <div class="box-header">
          <div class="col-md-2">
            <a href="/kendaraan">
              <button type="button" class="btn btn-block btn-info">
                <i class="fa fa-chevron-left"></i> <b>Kembali</b>
              </button>
            </a>
          </div>
        </div>
        <div class="box-body">
          {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="form-group">
              <label class="col-lg-3 control-label">Nomor Plat</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="NoPlat" value="{{$Kendaraan->noplat}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Jenis TNKB</label>
              <div class="col-lg-8">
                <select class="form-control" name="idTNKB" required>
                  <option value="" hidden="true"> Pilih Jenis TNKB </option>
                  @foreach ($JenisTNKB as $DataJenisTNKB)
                    <option value="{{$DataJenisTNKB->id}}" {{$Kendaraan->jenis_tnkb_id == $DataJenisTNKB->id ? 'selected' : ''}}>{{$DataJenisTNKB->jenis_tnkb}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Golongan Kendaraan</label>
              <div class="col-lg-8">
                <select class="form-control" name="idGolongan" id="golongan" required>
                  <option value="" hidden="true"> Pilih Golongan </option>
                  @foreach ($Golongan as $DataGolongan)
                    <option value="{{$DataGolongan->id}}" {{$GolonganSelected->id == $DataGolongan->id ? 'selected' : ''}}>{{$DataGolongan->golongan}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Merk Kendaraan</label>
              <div class="col-lg-8">
                <select class="form-control" name="idMerkKendaraan" id="merk" required>
                  <option value="" hidden="true"> Pilih Merk Kendaraan </option>
                  @foreach ($MerkKendaraan as $DataMerkKendaraan)
                    <option value="{{$DataMerkKendaraan->id}}" {{$Kendaraan->NJKB->merk_kendaraan_id == $DataMerkKendaraan->id ? 'selected' : ''}}>{{$DataMerkKendaraan->merk}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Tipe Kendaraan</label>
              <div class="col-lg-8">
                <select class="form-control" name="idTipeKendaraan" id="tipe" required>
                  <option value="" hidden="true"> Pilih Merk Kendaraan Dahulu </option>
                  @foreach ($TipeKendaraan as $DataTipeKendaraan)
                    <option value="{{$DataTipeKendaraan->id}}" {{$Kendaraan->NJKB->tipe_kendaraan_id == $DataTipeKendaraan->id ? 'selected' : ''}}>{{$DataTipeKendaraan->tipe}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Tahun Buat</label>
              <div class="col-lg-8">
                <select class="form-control" name="idNJKB" id="tahunbuat" required>
                  <option value="" hidden="true"> Pilih Merk dan Tipe Kendaraan Dahulu </option>
                  @foreach ($NJKB as $DataNJKB)
                    <option value="{{$DataNJKB->id}}" {{$Kendaraan->NJKB->id == $DataNJKB->id ? 'selected' : ''}}>{{$DataNJKB->tahun_buat}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nomor Rangka</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="NomorRangka" value="{{$Kendaraan->no_rangka}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nomor Mesin</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="NomorMesin" value="{{$Kendaraan->no_mesin}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Daerah UPPD</label>
              <div class="col-lg-8">
                <select class="form-control" name="idDaerahUPPD" required>
                  <option value="" hidden="true"> Pilih Daerah UPPD </option>
                  @foreach ($DaerahUPPD as $DataDaerahUPPD)
                    <option value="{{$DataDaerahUPPD->id}}" {{$Kendaraan->daerah_samsat_id == $DataDaerahUPPD->id ? 'selected' : ''}}>{{$DataDaerahUPPD->nama_daerah}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Masa Laku</label>
              <div class="col-lg-8">
                <input class="form-control" type="date" value="{{Carbon\Carbon::parse($Kendaraan->masalaku)->format('Y-m-d')}}" name="MasaLaku" required>
              </div>
            </div>

            <hr>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nomor KTP</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="NomorKTP" value="{{$Kendaraan->no_ktp}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="Nama" value="{{$Kendaraan->nama}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Alamat</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="Alamat" value="{{$Kendaraan->alamat}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
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
      var $idGol = $('#golongan').val();
      $.get('/json-tipe/tipe/'+this.value+'/'+$idGol+'/tipes.json', function(tipes)
      {
        var $tipe = $('#tipe');

        $tipe.find('option').remove().end();
        $tipe.append('<option value="" hidden>Pilih Tipe</option>');

        $.each(tipes, function(index, tipe) {
          $tipe.append('<option value="' + tipe.id + '">' + tipe.tipe + '</option>');
        });
      });
    });

    $('#golongan').change(function()
    {
      var $idMerk = $('#merk').val();
      $.get('/json-tipe/tipe/'+$idMerk+'/'+this.value+'/tipes.json', function(tipes)
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

  <script>
    $('#tipe').change(function()
    {
      var $idMerk = $('#merk').val();
      $.get('/json-tahunbuat/tahunbuat/'+$idMerk+'/'+this.value+'/tipes.json', function(tahuns)
      {
        var $tahunbuat = $('#tahunbuat');

        $tahunbuat.find('option').remove().end();
        $tahunbuat.append('<option value="" hidden>Pilih Tahun</option>');

        $.each(tahuns, function(index, tahun) {
          $tahunbuat.append('<option value="' + tahun.id + '">' + tahun.tahun_buat + '</option>');
        });
      });
    });

    $(document).ready(function() {
      $(".tipe option[value='0']").attr("disabled","disabled");
      $(".tahunbuat option[value='0']").attr("disabled","disabled");
    });
  </script>
@endsection
