<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KESBANGPOL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('assets/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('assets/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter -->
  <link rel="stylesheet" href="{{url('assets/dist/css/skins/_all-skins.min.css')}}">

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  {{-- <link rel="stylesheet" href="https://sso.banjarmasinkota.go.id/vendor/bjm-sso/bjm-sso.css">
	<script src="https://sso.banjarmasinkota.go.id/vendor/bjm-sso/bjm-sso.js"></script> --}}
  <link rel="stylesheet"type="text/css" href="http://server.banjarmasinkota.go.id:8000/vendor/bjm-sso/bjm-sso.css">
	<script src="http://server.banjarmasinkota.go.id:8000/vendor/bjm-sso/bjm-sso.js"></script>
  
    @stack('add_css')

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-purple-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
 @include('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
 
  @include('layouts.leftmenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('title')
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      @yield('konten')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.footer')

  <!-- Control Sidebar -->
  {{-- @include('layouts.gear') --}}
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{url('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('assets/dist/js/adminlte.min.js')}}"></script>
 <!-- Toastr -->
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script>
    @if(Session::has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch(type){
          case 'info':
              toastr.info("{{ Session::get('message') }}");
              break;
          
          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;
  
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;
  
          case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;
      }
    @endif
  </script>

<script>
  function clickLogin() {
      var sso = new BjmSSO();
      sso.loginWindow(function(result) {
          console.log(result);
          if (result['status']) {
              sendToServer(result);
          }
      });
  }

  function sendToServer(result) {
      var user = result['data']['user'];
      var token = result['data']['key'];
      var formData = new FormData();
      for ( var key in user ) {
          formData.append(key, user[key]);
      }
      formData.append('id_app', '{{ auth()->user()->id }}');
      formData.append('id_sso', user['id']);
      formData.append('token', token);
      formData.append('_token', '{{ csrf_token() }}');
      $.ajax({
          type: "POST",
          url: "{{ route('sso.sync') }}",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function(data, textStatus, jqXHR) {
              // $(".is-invalid").removeClass("is-invalid");
              if (data['status'] == true) {
                location.reload();
              }
              else {
                console.log(data['message']);
                toastr.error(data['message']);
                $("div").removeClass("loadingsso");
              } 
          },
          error: function(data, textStatus, jqXHR) {
              console.log(data);
              console.log('Login Gagal!');
          },
      });
  }
</script>
@stack('add_js')
</body>
</html>