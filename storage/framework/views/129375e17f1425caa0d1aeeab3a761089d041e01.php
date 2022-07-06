<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>KESBANGPOL</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/fusion/assets/css/bootstrap.min.css">
    <!-- Icon -->
    <link rel="stylesheet" href="/fusion/assets/fonts/line-icons.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="/fusion/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/fusion/assets/css/owl.theme.css">

    <!-- Animate -->
    <link rel="stylesheet" href="/fusion/assets/css/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="/fusion/assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" href="/fusion/assets/css/responsive.css">

</head>

<body>

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a href="index.html" class="navbar-brand nav-link" style="color: red">KESBANGPOL</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="lni-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Hero Area Start -->
        <div id="hero-area" class="hero-area-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                        <div class="contents">
                            <h2 class="head-title">KESBANGPOL</h2>
                            <p>Portal Informasi & Rekomendasi Penelitian Kesatuan
                                Bangsa Dan
                                Politik Kota Banjarmasin.</p>
                            <div class="header-button">
                                <a href="#" data-toggle="modal" data-target="#exampleModal"><img
                                        src="/icon_kesbang/rekom2.png" width="90px"></a>
                                <a href="#" data-toggle="modal" data-target="#kegiatanModal"><img
                                        src="/icon_kesbang/jadwal2.png" width="90px"></a>
                                <a href="#" data-toggle="modal" data-target="#ormasModal"><img
                                        src="/icon_kesbang/ormas2.png" width="90px"></a>
                                <a href="#" data-toggle="modal" data-target="#artikelModal"> <img
                                        src="/icon_kesbang/artikel2.png" width="90px"></a>
                                <a href="#" data-toggle="modal" data-target="#kontakModal"><img
                                        src="/icon_kesbang/kontak2.png" width="90px"></a>
                                <a href="#" data-toggle="modal" data-target="#dokumenModal"><img
                                        src="/icon_kesbang/dokumen2.png" width="90px"></a>
                                <a href="#" data-toggle="modal" data-target="#raModal">
                                    <img src="/icon_kesbang/ra2.png" width="90px"></a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                        <div class="intro-img">
                            <img class="img-fluid" src="/fusion/assets/img/intro-mobile.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->

    </header>
    <!-- Header Area wrapper End -->


    <!-- Preloader -->
    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Login Aplikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div><br />
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Login</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#daftarModal">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Daftar Rekomendasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                aria-describedby="emailHelp" placeholder="Nama Lengkap">
                        </div><br />
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="email" placeholder="Enter email">
                        </div><br />
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Konfirmasi Password</label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="kegiatanModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Jadwal Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr class="bg-danger text-white"
                                style="font-family: Arial, Helvetica, sans-serif;font-size:12px;font-weight:bold">
                                <td>NO</td>
                                <td>TANGGAL</td>
                                <td>KEGIATAN</td>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="ormasModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Organisasi Masyarakat Terdaftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr class="bg-danger text-white"
                                style="font-family: Arial, Helvetica, sans-serif;font-size:12px;font-weight:bold">
                                <td>NO</td>
                                <td>NAMA ORMAS</td>
                                <td>DASAR HUKUM PENDIRIAN</td>
                                <td>BIDANG</td>
                                <td>STATUS</td>
                                <td>KETERANGAN</td>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="artikelModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Artikel Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr class="bg-danger text-white"
                                style="font-family: Arial, Helvetica, sans-serif;font-size:12px;font-weight:bold">
                                <td>NO</td>
                                <td>IMAGE</td>
                                <td>JUDUL</td>
                                <td>DESKRIPSI</td>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="kontakModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Kontak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr class="bg-danger text-white"
                                style="font-family: Arial, Helvetica, sans-serif;font-size:12px;font-weight:bold">
                                <td>NO</td>
                                <td>PARAMETER</td>
                                <td>KETERANGAN</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Alamat</td>
                                <td>JL RE Martadinata no 1</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>e-mail</td>
                                <td>kesbangpol@mail.banjarmasinkota.go.id</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Telp</td>
                                <td>0511-234324</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="dokumenModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr class="bg-danger text-white"
                                style="font-family: Arial, Helvetica, sans-serif;font-size:12px;font-weight:bold">
                                <td>NO</td>
                                <td>FILE</td>
                                <td>JUDUL</td>
                                <td>SIZE</td>
                                <td></td>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="raModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Realisasi Anggaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-sm">
                        GRAFIK?
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/fusion/assets/js/jquery-min.js"></script>
    <script src="/fusion/assets/js/popper.min.js"></script>
    <script src="/fusion/assets/js/bootstrap.min.js"></script>
    <script src="/fusion/assets/js/owl.carousel.min.js"></script>
    <script src="/fusion/assets/js/wow.js"></script>
    <script src="/fusion/assets/js/jquery.nav.js"></script>
    <script src="/fusion/assets/js/scrolling-nav.js"></script>
    <script src="/fusion/assets/js/jquery.easing.min.js"></script>
    <script src="/fusion/assets/js/main.js"></script>
    <script src="/fusion/assets/js/form-validator.min.js"></script>
    <script src="/fusion/assets/js/contact-form-script.min.js"></script>

</body>

</html>