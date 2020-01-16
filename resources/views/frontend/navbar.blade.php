<nav class="navbar navbar-static-top bg-purple-gradient">
        <div class="container">
          <div class="navbar-header">
            <img src="{{url('assets/logo.png')}}" height="60px">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
  
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
              <li><a href="#"><i class="fa fa-list"></i> Pelaporan</a></li>
              <li><a href="#"><i class="fa fa-credit-card"></i> SPR</a></li>
              <li><a href="#"><i class="fa fa-group "></i> ORMAS</a></li>
              <li><a href="#" class="modal-daftar" data-toggle="modal" data-target="#modal-daftar"><i class="fa fa-chevron-circle-down "></i> Daftar</a></li>
              <li><a href="#" class="modal-login" data-toggle="modal" data-target="#modal-login"><i class="fa fa-sign-out "></i> Login</a></li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
  
          <!-- Navbar Right Menu -->
          
          @include('frontend.rightmenu')
          <!-- /.navbar-custom-menu -->
  
        </div>
        <!-- /.container-fluid -->
      </nav>