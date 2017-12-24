<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') | SAMSAT Banjarmasin II</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/Public-User/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/Public-User/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/Public-User/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/Public-User/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/Public-User/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/Public-User/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/Public-User/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/Public-User/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/Public-User/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/Public-User/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- SWEET ALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="/Public-User/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="/Public-User/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  {{-- Menentukan Status User --}}
  @php
    switch (Auth::user()->tipe) {
      case '1':
        $Status = 'Pelayanan';
        $warna  = 'green';
        break;

      case '2':
        $Status = 'Jasa Raharja';
        $warna  = 'blue';
        break;

      case '3':
        $Status = 'Kasir';
        $warna  = 'yellow';
        break;

      case '4':
        $Status = 'Master';
        $warna  = 'purple';
        break;

      default:
        $Status = 'Suspend';
        $warna  = 'red';
        break;
    }
  @endphp
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-{{$warna}} sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><img src="/Public-User/Image/Logo/LogoPemprovKalsel.png" style="max-width:100%"></img></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SAMSAT</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/Public-User/Image/Profile/{{Auth::user()->foto}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->nama}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/Public-User/Image/Profile/{{Auth::user()->foto}}" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->nama}}
                  <br>
                  {{$Status}}
                  <small>{{Auth::user()->nip}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <button class="btn btn-default btn-flat" onclick="logout()">Logout</button>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/Public-User/Image/Profile/{{Auth::user()->foto}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->nama}}</p>
          <a href="#"><i class="fa fa-circle text-{{$warna}}"></i> {{$Status}}</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li>
          <a href="/dashboard">
            <i class="fa fa-th"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="header">MENU PELAYANAN</li>
        <li>
          <a href="/pelayanan">
            <i class="fa fa-th"></i> <span>Data Pelayanan</span>
          </a>
        </li>

      @if (Auth::user()->tipe == '4')
        {{-- Menu Master  --}}
        <li class="header">MENU MASTER</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Data User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/user"><i class="fa fa-user-o"></i> Data User</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/jenis-tnkb"><i class="fa fa-bars"></i> Jenis TNKB</a></li>
            <li><a href="/golongan-kendaraan"><i class="fa fa-th-large"></i> Golongan Kendaraan</a></li>
            <li><a href="/daerah-uppd"><i class="fa fa-th-large"></i> Daerah UPPD</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Master Data Kendaraan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/merk-kendaraan"><i class="fa fa-bars"></i> Merk Kendaraan</a></li>
            <li><a href="/tipe-kendaraan"><i class="fa fa-server"></i> Tipe Kendaraan</a></li>
            <li><a href="/njkb-kendaraan"><i class="fa fa-server"></i> NJKB Kendaraan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Data Kendaraan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/kendaraan"><i class="fa fa-eercast"></i> Data Kendaraan</a></li>
          </ul>
        </li>
        <li class="header">LAPORAN</li>
        <li>
          <a href="/laporan-pendapatan-pkb">
            <i class="fa fa-th"></i> <span>Pendapatan PKB</span>
          </a>
        </li>
        <li>
          <a href="/laporan-pendapatan-swdkljj">
            <i class="fa fa-th"></i> <span>Pendapatan SWDKLJJ</span>
          </a>
        </li>
        <li>
          <a href="/laporan-kendaraan-pajak-mati">
            <i class="fa fa-th"></i> <span>Kendaraan Pajak Mati</span>
          </a>
        </li>
        <li>
<<<<<<< HEAD
          <a href="/laporan-registrasi-batal">
            <i class="fa fa-th"></i> <span>Registrasi Batal</span>
          </a>
        </li>
        <li>
          <a href="/laporan-kendaraan">
            <i class="fa fa-th"></i> <span>Kendaraan</span>
=======
          <a href="/laporan-kendaraan-bayar-pajak">
            <i class="fa fa-th"></i> <span>Kendaraan Bayar Pajak</span>
          </a>
        </li>
        <li>
          <a href="/laporan-registrasi-batal">
            <i class="fa fa-th"></i> <span>Registrasi Batal</span>
>>>>>>> ea2daf11df1dea958e3d4e63eb5e25396949c572
          </a>
        </li>

      @endif

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
@yield('content')

<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="container">
    <div class="pull-right hidden-xs">
      <b>UNIVERSITAS ISLAM KALIMANTAN</b> Arsyad Al-Banjari
    </div>
    <strong>Copyright &copy; 2017 <a href="https://btc.id/FaruqRahmadani.bitcoin" target="_blank">Faruq Rahmadani</a>.</strong>
  </div>
  <!-- /.container -->
</footer>
</div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/Public-User/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/Public-User/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/Public-User/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/Public-User/bower_components/raphael/raphael.min.js"></script>
<script src="/Public-User/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/Public-User/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/Public-User/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/Public-User/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/Public-User/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/Public-User/bower_components/moment/min/moment.min.js"></script>
<script src="/Public-User/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/Public-User/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/Public-User/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/Public-User/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/Public-User/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/Public-User/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/Public-User/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/Public-User/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="/Public-User/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/Public-User/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  function logout()
  {
    swal({
      title   : "Logout",
      text    : "Yakin Ingin Keluar?",
      icon    : "warning",
      buttons : [
        "Batal",
        "Logout",
      ],
    })
    .then((logout) => {
      if (logout) {
        swal({
          title  : "Logout",
          text   : "Anda Telah Logout",
          icon   : "success",
          timer  : 2500,
        });
        window.location = "/logout";
      } else {
        swal({
          title  : "Batal Logout",
          text   : "Anda Batal Logout",
          icon   : "info",
          timer  : 2500,
        })
      }
    });
  }
</script>
</body>
</html>
