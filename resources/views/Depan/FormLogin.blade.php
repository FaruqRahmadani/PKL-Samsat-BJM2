@extends('Depan.Layouts.Master')
@section('content')

<!-- Full Width Column -->
<div class="content-wrapper" style="background-image: url(/Public-Depan/Image/bg-body.png);">
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('title')
          Login
        @endsection
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-success login-box">
        <div class="login-logo">
          <b>Login</b>User
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">

          <form action="{{route('login')}}" method="post">
            {{csrf_field()}}
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Username" name="username">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" name="password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
        <!-- /.login-box-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.container -->
</div>

@endsection
