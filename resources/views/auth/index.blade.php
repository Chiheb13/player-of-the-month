<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ app()->getlocale() }}">
<head>
  @include('layouts.dashboard.header')
</head>
<body class="hold-transition login-page">
@yield('content')
  <footer class="main-footer">
    @include('layouts.dashboard.footer')
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js ')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset ('vendors/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
