<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KESBANGPOL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo e(url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(url('assets/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(url('assets/bower_components/Ionicons/css/ionicons.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(url('assets/dist/css/AdminLTE.min.css')); ?>">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter -->
  <link rel="stylesheet" href="<?php echo e(url('assets/dist/css/skins/_all-skins.min.css')); ?>">
    <?php echo $__env->yieldPushContent('add_css'); ?>

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
 <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- Left side column. contains the logo and sidebar -->
 
  <?php echo $__env->make('layouts.leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php echo $__env->yieldContent('title'); ?>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <?php echo $__env->yieldContent('konten'); ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo e(url('assets/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(url('assets/dist/js/adminlte.min.js')); ?>"></script>
 <!-- Toastr -->
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script>
    <?php if(Session::has('message')): ?>
      var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
      switch(type){
          case 'info':
              toastr.info("<?php echo e(Session::get('message')); ?>");
              break;
          
          case 'warning':
              toastr.warning("<?php echo e(Session::get('message')); ?>");
              break;
  
          case 'success':
              toastr.success("<?php echo e(Session::get('message')); ?>");
              break;
  
          case 'error':
              toastr.error("<?php echo e(Session::get('message')); ?>");
              break;
      }
    <?php endif; ?>
  </script>

<?php echo $__env->yieldPushContent('add_js'); ?>
</body>
</html>