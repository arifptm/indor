<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Application</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('/bower_components/ionicons/css/ionicons.min.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/dist/css/skins/skin-green.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('/css/app.css') }} ">
  @yield('h-scripts')
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    @include('layouts.header')
  </header>
  
  <aside class="main-sidebar">
    <section class="sidebar">
      @include('layouts.sidebar')
    </section>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      @yield('content-title')
    </section>

    
    <section class="content">
      @yield('content')
    </section>
    
  </div>

  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<script src="{{ asset('/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/bower_components/AdminLTE/dist/js/app.min.js') }}"></script>
  @yield('f-scripts')
</body>
</html>
