<?php $__env->startSection('navbar-transparan'); ?>
<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br /><br />


<div id="contact" class="content bg-silver-lighter" data-scrollview="true">
    <!-- begin container -->
    <div class="container">
    <h2 class="content-title"><?php echo e($data->datas['judul']); ?></h2>
        
        <!-- begin row -->
        <div class="row">
            <!-- begin col-6 -->
            <div class="col-md-6" data-animation="true" data-animation-type="fadeInLeft">
                <h3>Jika Anda memiliki hal yang ingin Anda diskusikan, Silahkan hubungi kami..</h3>
                
                <p>
                    <strong><?php echo e($data->datas['instansi']); ?></strong><br />
                    <?php echo e($data->datas['alamat']); ?><br />
                    Banjarmasin<br />
                    Fax: <?php echo e($data->datas['fax']); ?><br />
                </p>
                <p>
                    <span class="phone">Telp: <?php echo e($data->datas['telp']); ?></span><br />
                    <a href="mailto:<?php echo e($data->datas['email']); ?>"><?php echo e($data->datas['email']); ?></a>
                </p>
            </div>
            <!-- end col-6 -->
            <!-- begin col-6 -->
            <div class="col-md-6 form-col" data-animation="true" data-animation-type="fadeInRight">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-3">Nama <span class="text-theme">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email <span class="text-theme">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Telp <span class="text-theme">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Pesan <span class="text-theme">*</span></label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"></label>
                        <div class="col-md-9 text-left">
                            <button type="submit" class="btn btn-theme btn-block">Kirim Pesan</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end col-6 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('color.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>