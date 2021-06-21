<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo e(url('assets/user.png')); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        <p>
          <?php if(Auth::user() == null): ?>
          -
          <?php else: ?>
              
            <?php echo e(Auth::user()->name); ?>

          <?php endif; ?>
        </p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <?php if(Auth::user() == null): ?>
      -
      <?php else: ?>          
        <!-- Sidebar Menu -->
        <?php if(auth()->user()->hasRole('admin')): ?>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
          <li><a href="<?php echo e(route('admin.artikel')); ?>"><i class="fa fa-newspaper-o"></i> <span>Artikel</span></a></li>
          <li><a href="<?php echo e(route('admin.kegiatan')); ?>"><i class="fa fa-calendar-plus-o"></i> <span>Jadwal Kegiatan</span></a></li>
          <li><a href="<?php echo e(route('admin.riset')); ?>"><i class="fa fa-credit-card"></i> <span>Surat Rekomendasi Peneltian</span></a></li>
          <li><a href="<?php echo e(route('admin.ormas')); ?>"><i class="fa fa-group"></i> <span>Daftar Ormas</span></a></li>
          <li><a href="<?php echo e(route('admin.grafik')); ?>"><i class="fa fa-bar-chart"></i> <span>Grafik</span></a></li>
          <li><a href="<?php echo e(route('admin.dokumen')); ?>"><i class="fa fa-file"></i> <span>Dokumen</span></a></li>
          <li><a href="<?php echo e(route('admin.kategori')); ?>"><i class="fa fa-tasks"></i> <span>Kategori Dokumen</span></a></li>
          <li class="treeview">
              <a href="#">
                <i class="fa fa-toggle-down"></i>
                <span>Halaman</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(route('admin.beranda')); ?>"><i class="fa fa-circle"></i>Beranda</a></li>
                <li><a href="<?php echo e(route('admin.background')); ?>"><i class="fa fa-circle"></i>Background</a></li>
                <li><a href="<?php echo e(route('admin.profil')); ?>"><i class="fa fa-circle"></i> Profil</a></li>
                <li><a href="<?php echo e(route('admin.layanan')); ?>"><i class="fa fa-circle"></i> Layanan</a></li>
                <li><a href="<?php echo e(route('admin.kontak')); ?>"><i class="fa fa-circle"></i> Kontak</a></li>
              </ul>
            </li>
          <li><a href="<?php echo e(route('admin.pejabat')); ?>"><i class="fa fa-circle"></i> Pejabat TTD</a></li>
          <li><a href="<?php echo e(route('admin.account')); ?>"><i class="fa fa-user-plus"></i> <span>Account</span></a></li>
          <li><a href="<?php echo e(route('logout')); ?>"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
        </ul>
        <?php elseif(auth()->user()->hasRole('user')): ?>
        <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN MENU</li>
              <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
              <li><a href="<?php echo e(route('user.riset')); ?>"><i class="fa fa-credit-card"></i> <span>Surat Rekomendasi Peneltian</span></a></li>
              <li><a href="<?php echo e(route('gantipass')); ?>"><i class="fa fa-user-plus"></i> <span>Ganti Password</span></a></li>
              <li><a href="<?php echo e(route('logout')); ?>"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
        </ul>
        <?php else: ?>
            Tidak Memiliki Role
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="<?php echo e(route('logout')); ?>"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
        </ul>
        <?php endif; ?>
      <?php endif; ?>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>