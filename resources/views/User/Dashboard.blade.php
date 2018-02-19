@extends('User.Layouts.Master')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        @section('title')
          Dashboard
        @endsection
        Dashboard
        <small>{{Carbon\Carbon::now()->format('d - m - Y')}}</small>
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{count($Transaksi->whereIn('status', ['0','1']))}}</h3>
              <p>Berkas di Pelayanan</p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{count($Transaksi->where('status', '2'))}}</h3>
              <p>Berkas di Jasa Raharja</p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{count($Transaksi->where('status', '3'))}}</h3>
              <p>Berkas di Kasir</p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>{{count($Transaksi->where('status', '4'))}}</h3>
              <p>Berkas di Master</p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
