<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>KESBANGPOL</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="/welcome/assets/images/favicon.png" type="image/png">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="/welcome/assets/css/magnific-popup.css">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="/welcome/assets/css/slick.css">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="/welcome/assets/css/LineIcons.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="/welcome/assets/css/bootstrap.min.css">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="/welcome/assets/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="/welcome/assets/css/style.css">

    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://bapintar.banjarmasinkota.go.id/vendor/bjm-sso/bjm-sso.css">
    <script src="https://bapintar.banjarmasinkota.go.id/vendor/bjm-sso/bjm-sso.js"></script>

    <script type="text/javascript" src="<?php echo e(url('js/Chart.js')); ?>"></script>

</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->


    <!--====== NAVBAR TWO PART ENDS ======-->

    <!--====== SLIDER PART START ======-->

    <section id="home" class="slider_area">
        <div id="carouselThree" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselThree" data-slide-to="0" class="active"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h2 class="title text-center">KESBANGPOL</h2>
                                    <p class="text text-center"><STRONG>SARAN DIGITAL</STRONG></p>
                                    <form action="/sarandigital" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-input mt-25">
                                                    <div class="input-items default">
                                                        <textarea placeholder="Saran/Pesan" name="message" required></textarea>
                                                        <i class="lni lni-pencil-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <p class="form-message"></p>

                                            <div class="col-md-12">
                                                <div class="form-input light-rounded-buttons mt-30">
                                                    <button class="main-btn btn-block rounded-one">KIRIM</button>
                                                </div> <!-- form input -->
                                            </div>
                                        </div> <!-- row -->
                                    </form>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                    <div class="slider-image-box d-none d-lg-flex align-items-end" style="height: 60%">
                        <div class="slider-image">
                            &nbsp;&nbsp;&nbsp;&nbsp;<img src="/icon_kesbang/mp.png" width="80%">
                        </div> <!-- slider-imgae -->
                    </div> <!-- slider-imgae box -->
                </div> <!-- carousel-item -->
            </div>

            <a class="carousel-control-prev" href="#carouselThree" role="button" data-slide="prev">
                <i class="lni lni-arrow-left"></i>
            </a>
            <a class="carousel-control-next" href="#carouselThree" role="button" data-slide="next">
                <i class="lni lni-arrow-right"></i>
            </a>
        </div>
    </section>
    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART START ======-->

    <!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">
                    
                </div>
            </div>
        </div>
    </section>
-->



    <!--====== Jquery js ======-->
    <script src="/welcome/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/welcome/assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="/welcome/assets/js/popper.min.js"></script>
    <script src="/welcome/assets/js/bootstrap.min.js"></script>

    <!--====== Slick js ======-->
    <script src="/welcome/assets/js/slick.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="/welcome/assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script src="/welcome/assets/js/ajax-contact.js"></script>

    <!--====== Isotope js ======-->
    <script src="/welcome/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="/welcome/assets/js/isotope.pkgd.min.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="/welcome/assets/js/jquery.easing.min.js"></script>
    <script src="/welcome/assets/js/scrolling-nav.js"></script>

    <!--====== Main js ======-->
    <script src="/welcome/assets/js/main.js"></script>
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
    

</html>