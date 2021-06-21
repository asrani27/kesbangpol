<!-- begin navbar-header -->
<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a href="#" class="navbar-brand">
        <img src="<?php echo e(url('assets/logo.png')); ?>">
    </a>
    <a href="#" class="navbar-brand">
        <span class="brand-text">
            <span class="text-theme">BAKESBANGPOL</span> 
        </span>
    </a>
    
</div>
<!-- end navbar-header -->
<!-- begin navbar-collapse -->
<div class="collapse navbar-collapse" id="header-navbar">
    <ul class="nav navbar-nav navbar-right">
        <li class="<?php echo e((request()->is('/*')) ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/')); ?>">HOME</a>
        </li>
        <li class="<?php echo e((strpos(Route::currentRouteName(), 'artikel') === 0) ? 'active' : ''); ?>"><a href="<?php echo e(route('artikel')); ?>">KEGIATAN</a></li>
        <li class="<?php echo e((strpos(Route::currentRouteName(), 'layanan') === 0) ? 'active' : ''); ?>"><a href="<?php echo e(route('layanan')); ?>">LAYANAN</a></li>
        <li class="<?php echo e((strpos(Route::currentRouteName(), 'profil') === 0) ? 'active' : ''); ?>"><a href="<?php echo e(route('profil')); ?>">PROFIL</a></li>
        <li class="<?php echo e((strpos(Route::currentRouteName(), 'ormas') === 0) ? 'active' : ''); ?>"><a href="<?php echo e(route('ormas')); ?>">ORMAS</a></li>
        <li class="<?php echo e((strpos(Route::currentRouteName(), 'kontak') === 0) ? 'active' : ''); ?>"><a href="<?php echo e(route('kontak')); ?>">KONTAK</a></li>
        <li><a href="#" onclick="modalDaftar()">DAFTAR</a></li>
        <li><a href="#" data-toggle="modal" data-target="#modal-login">MASUK</a></li>  
        <li class="dropdown">
            <a href="#" data-click="scroll-to-target" data-toggle="dropdown">DOKUMEN <b class="caret"></b></a>
            <ul class="dropdown-menu dropdown-menu-left animated fadeInDown">
                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('kategori',$k->id)); ?>"><?php echo e($k->nama); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
     </ul>
</div>
<!-- end navbar-collapse -->