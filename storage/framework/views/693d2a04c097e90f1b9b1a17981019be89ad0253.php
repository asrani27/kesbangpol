<?php $__env->startSection('navbar-transparan'); ?>
<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
<br />
<br />
<div id="work" class="content" data-scrollview="true">
    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInDown">
    <h2 class="content-title">Galery <?php echo e($namaOrmas); ?></h2>
        <p class="content-desc">
            
        </p>
        <?php
            $values = $data->toArray();
            $rowsregion = array_chunk($values, 4);
        ?>
        <?php $__currentLoopData = $rowsregion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row row-space-10">
            <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                <div class="col-md-3 col-sm-6">
                    <!-- begin work -->
                    <div class="work">
                        <div class="image">
                            <a href="#"><img src="<?php echo e(url('storage/'.$item['filename'])); ?>" width="300px" height="200px"/></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title"><?php echo e($item['judul']); ?></span>
                            <span class="desc-text">Tgl Upload :<?php echo e(\Carbon\Carbon::parse($item['created_at'])->format('d M Y')); ?> </span>
                        </div>
                    </div>
                    <!-- end work -->
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </div>
    <!-- end container -->
</div>
<!-- end #work -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('color.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>