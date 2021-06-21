<?php $__env->startSection('navbar-transparan'); ?>
<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br /><br />
        <!-- begin tabs / accordion -->
        <div id="layanan" class="content bg-silver">
            <!-- begin container -->
            <div class="container" data-animation="true" data-animation-type="fadeInDown">
                <h2 class="content-title">Daftar Layanan BAKESBANGPOL</h2>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordion-<?php echo e($dt->id); ?>">#<?php echo e($no++); ?>. <?php echo e(strtoupper($dt->nama)); ?></a>
                                        </h4>
                                    </div>
                                    <div id="accordion-<?php echo e($dt->id); ?>" class="panel-collapse collapse <?php if($dt->id == 1): ?>in <?php else: ?> <?php endif; ?>">
                                        <div class="panel-body">
                                            <p>
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