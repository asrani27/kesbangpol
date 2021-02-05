<?php $__env->startSection('navbar-transparan'); ?>
<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br /><br />
        <!-- begin tabs / accordion -->
        <div id="layanan" class="content bg-silver">
            <!-- begin container -->
            <div class="container" data-animation="true" data-animation-type="fadeInDown">
                <h2 class="content-title">DETAIL KEGIATAN</h2>
                <!-- begin row -->
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-12">
                        <!-- begin panel-group -->
                        <div class="panel-group m-b-0" id="accordion">
                            <!-- begin panel -->
                            <?php
                            $no =1;
                            ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordion-<?php echo e($dt->id); ?>">
                                                Tgl : <?php echo e(\Carbon\Carbon::parse($dt->created_at)->format('d M Y')); ?>, Posting By : Admin </a>
                                        </h4>
                                    </div>
                                    <div id="accordion-<?php echo e($dt->id); ?>" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                               <h3> <?php echo e(strtoupper($dt->judul)); ?> </h3>
                                            <p>
                                                    <img src="<?php echo e(url('storage/artikel/'.$dt->gambar)); ?>" width="90%" style="float:justify; padding-right:20px;">
                                                   
                                                    <?php echo $dt->isi; ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <!-- end panel-->
                        </div>
                        <!-- end panel-group -->
                    </div>
                    <!-- end col-6 -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end tabs / accordion -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('color.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>