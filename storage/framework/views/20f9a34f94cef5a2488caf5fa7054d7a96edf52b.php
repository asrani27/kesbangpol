<?php $__env->startSection('konten'); ?>
 <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-12 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?php echo e($countRiset); ?></h3>

              <p>Surat Rekomendasi</p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="<?php echo e(url('/riset')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
              <!-- ./col -->
    </div>

    <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable"> 
                <!-- Map box -->
                <div class="box box-solid bg-green-gradient">
                  <div class="box-header">
                    <h3 class="box-title">
                      Syarat Permohonan Rekomendasi
                    </h3>
                  </div>
                  <div class="box-body">
                    
                  </div>
                </div>
                <!-- /.box -->    
              </section>
            <!-- /.Left col -->
          </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('add_js'); ?>

<?php $__env->stopPush(); ?>    
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>