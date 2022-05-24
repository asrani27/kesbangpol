<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<?php echo $__env->make('color.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body data-spy="scroll" data-target="#header-navbar" data-offset="51">
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin #header -->
        <?php echo $__env->yieldContent('navbar-transparan'); ?>
            <!-- begin container -->
            <div class="container">
                <?php echo $__env->make('color.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <!-- end container -->
        </div>
        <!-- end #header -->
        
        <!-- begin #home -->

        <?php echo $__env->yieldContent('content'); ?>
        <!-- end #home -->
       
        
        
        <!-- begin theme-panel -->
        
        <!-- end theme-panel -->
    </div>
    <!-- end #page-container -->
    <div class="modal fade" id="modal-daftar" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">Daftar</h4>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" method="POST" action="<?php echo e(route('daftar')); ?>">
                    <?php echo e(csrf_field()); ?>

    
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Nama Lengkap</label>
    
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">E-Mail</label>
                        <div class="col-md-6">
                            <input id="emailreg" type="email" class="form-control emailreg" name="email" value="<?php echo e(old('email')); ?>" required>
                        <span id="error_email"></span>
                        </div>
                        <label class="col-md-1 control-label"></label>
                    </div>
    
                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Password</label>
    
                        <div class="col-md-6">
                            <input id="passwordreg" type="password" class="form-control" name="password" required>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
    
                        <div class="col-md-6">
                            <input id="password-confirmreg" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label"></label>
                        <div class="checkbox col-md-6">
                            <label>
                                <input type="checkbox" onclick="showPassDaftar()"> Tampilkan Password  
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-theme pull-left" data-dismiss="modal">Keluar</button>
                  <button type="submit" class="btn btn-sm btn-primary">Daftar</button>
                </div>
    
              </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
    </div>
    
    <div class="modal fade" id="modal-login" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-purple-gradient">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">Login E-App</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

    
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail / Telp</label>
    
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="username" required autofocus>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>
    
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label"></label>
                            <div class="checkbox col-md-6">
                                <label>
                                    <input type="checkbox" onclick="showPass()"> Tampilkan Password  
                                </label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-theme pull-left" data-dismiss="modal">Keluar</button>
                  <button type="button" class="btn btn-primary" onClick="clickLogin();">MASUK / DAFTAR SSO</button>
                  <button type="submit" class="btn btn-primary">Masuk</button>
                </div>
              </form>  
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
    </div>
    
	<script src="<?php echo e(url('color/assets/plugins/js-cookie/js.cookie.js')); ?>"></script>
	<script src="<?php echo e(url('color/assets/js/blog/apps.min.js')); ?>"></script>
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo e(url('color/assets/plugins/jquery/jquery-3.2.1.min.js')); ?>"></script>
	<script src="<?php echo e(url('color/assets/plugins/bootstrap3/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(url('color/assets/plugins/js-cookie/js.cookie.js')); ?>"></script>
	<script src="<?php echo e(url('color/assets/plugins/scrollMonitor/scrollMonitor.js')); ?>"></script>
	<script src="<?php echo e(url('color/assets/js/one-page-parallax/apps.min.js')); ?>"></script>
    <!-- ================== END BASE JS ================== -->
    <?php echo $__env->yieldPushContent('add_js'); ?>
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
  
          case 'error':
              toastr.error("<?php echo e(Session::get('message')); ?>");
              break;
              
          case 'success':
              toastr.success("<?php echo e(Session::get('message')); ?>");
              break;
  
      }
    <?php endif; ?>
</script>
	<script>    
            function showPass()
            {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            function showPassDaftar()
            {
                var x = document.getElementById("passwordreg");
                var z = document.getElementById("password-confirmreg");
                if (x.type === "password" && z.type === "password") {
                    x.type = "text";
                    z.type = "text";
                } else {
                    x.type = "password";
                    z.type = "password";
                }
            }
            function modalDaftar()
            {
                document.getElementById('emailreg').value = '';
                document.getElementById('passwordreg').value = '';
                $('#error_email').html('');
                $('#modal-daftar').modal('show');
            }

	    $(document).ready(function() {
	        App.init();


        $(".emailreg").keyup(function(){
            email = document.getElementById('emailreg').value;
            var _token = $('input[name="_token"]').val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            
            if(!filter.test(email))
            {
                $('#error_email').html('<label class="text-danger">Format Email Salah</label>');
            }
            else
            {
                $.ajax({
                    url:"<?php echo e(route('cek.mail')); ?>",
                    method:"POST",
                    data:{email:email, _token:_token},
                    success:function(result)
                    {
                        if(result === 0)
                        {
                            $('#error_email').html('<label class="text-success">Email Tersedia</label>');
                        }
                        else
                        {
                            $('#error_email').html('<label class="text-danger">Email Sudah Ada</label>');
                        }
                    }
                });
            }
        });
    });
	</script>

    <!-- The user is authenticated... -->
    
    <script>
    <?php if(Auth::check()): ?>
    $(function() { 
        window.location.replace("<?php echo e(url('/')); ?>");
    });
    <?php else: ?>
    
    console.log('ok');
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
        formData.append('id_sso', user['id']);
        formData.append('token', token);
        formData.append('_token', '<?php echo e(csrf_token()); ?>');
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('sso.register')); ?>",
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

    $(function() { 
        <?php if(request('is_sso')): ?>
        var sso = new BjmSSO();
        sso.login(function(result) {
            console.log(result);
            if (result['status']) {
                sendToServer(result);
            }
        });
        <?php endif; ?>
    });
    </script>
    <?php endif; ?>

</body>
</html>
