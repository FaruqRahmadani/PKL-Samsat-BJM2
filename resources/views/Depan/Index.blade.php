@extends('Depan.Layouts.Master')
@section('content')

<!-- Full Width Column -->
<div class="content-wrapper" style="background-image: url(/Public-Depan/Image/bg-body.png);">
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Beranda
        @section('title')
          Beranda
        @endsection
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-info">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="http://cdn2.tstatic.net/banjarmasin/foto/bank/images/samsat-uppd-banjarmasin_20170630_103915.jpg" style="width: 100%; max-height:400px">
              </div>

              <div class="item">
                <img src="https://i.ytimg.com/vi/apDXA-KIcMs/maxresdefault.jpg" style="width: 100%; max-height:400px">
              </div>

              <div class="item">
                <img src="http://cdn2.tstatic.net/banjarmasin/foto/bank/images/samsat-uppd-banjarmasin_20170630_103915.jpg" style="width: 100%; max-height:400px">
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          {{-- <p><img src="http://cdn2.tstatic.net/banjarmasin/foto/bank/images/samsat-uppd-banjarmasin_20170630_103915.jpg" style="width:100%"></img></p> --}}

      </div>
      <div class="callout callout-success">
        <h4>Lokasi Samsat Banjarmasin II</h4>
          <div id="map" style="width:100%;height:400px"></div>
            <script>
              function initMap() {
                var uluru = {lat: -3.296700, lng: 114.589964};
                var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 16,
                  center: uluru
                });
                var marker = new google.maps.Marker({
                  position: uluru,
                  map: map
                });
              }
            </script>
            <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqoTpkLgCI7zLb24ipxkLsa8Q01EWQ_d0&callback=initMap">
            </script>
          </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.container -->
</div>

@endsection
