<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') | SAMSAT Banjarmasin II</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/Public-User/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/Public-User/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/Public-User/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="/Public-User/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/Public-User/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="/Public-User/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="/Public-User/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="/Public-User/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="/Public-User/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="/Public-User/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-{{$warna}} sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="/dashboard" class="logo">
        <span class="logo-mini"><b><img src="/Public-User/Image/Logo/LogoPemprovKalsel.png" style="max-width:100%"></img></span>
          <span class="logo-lg"><b>SAMSAT</b></span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/Public-User/Image/Profile/{{Auth::user()->foto}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{Auth::user()->nama}}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="/Public-User/Image/Profile/{{Auth::user()->foto}}" class="img-circle" alt="User Image">
                    <p>
                      {{Auth::user()->nama}}
                      <br>
                      {{$Status}}
                      <small>{{Auth::user()->nip}}</small>
                    </p>
                  </li>
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
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="/Public-User/Image/Profile/{{Auth::user()->foto}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{Auth::user()->nama}}</p>
              <a href="#"><i class="fa fa-circle text-{{$warna}}"></i> {{$Status}}</a>
            </div>
          </div>
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
                <a href="/laporan-registrasi-batal">
                  <i class="fa fa-th"></i> <span>Registrasi Batal</span>
                </a>
              </li>
              <li>
                <a href="/laporan-kendaraan">
                  <i class="fa fa-th"></i> <span>Kendaraan</span>
                </a>
              </li>
            @endif
          </ul>
        </section>
      </aside>
      @yield('content')
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs" style="margin-right: 125px;">
            <b>UNIVERSITAS ISLAM KALIMANTAN</b> Arsyad Al-Banjari
          </div>
          <strong>Copyright &copy; 2017 <a href="https://btc.id/FaruqRahmadani.bitcoin" target="_blank">Faruq Rahmadani</a>.</strong>
        </div>
      </footer>
      <aside class="control-sidebar control-sidebar-dark">
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul>
            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul>
          </div>
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div>
              <h3 class="control-sidebar-heading">Chat Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div>
            </form>
          </div>
        </div>
      </aside>
    </div>
  <script src="/Public-User/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="/Public-User/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="/Public-User/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="/Public-User/bower_components/raphael/raphael.min.js"></script>
  <script src="/Public-User/bower_components/morris.js/morris.min.js"></script>
  <script src="/Public-User/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <script src="/Public-User/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="/Public-User/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="/Public-User/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="/Public-User/bower_components/moment/min/moment.min.js"></script>
  <script src="/Public-User/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="/Public-User/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="/Public-User/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="/Public-User/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="/Public-User/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="/Public-User/dist/js/adminlte.min.js"></script>
  <script src="/Public-User/dist/js/pages/dashboard.js"></script>
  <script src="/Public-User/dist/js/demo.js"></script>
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
