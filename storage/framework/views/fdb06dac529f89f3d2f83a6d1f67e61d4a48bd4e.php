<?php $__env->startPush('add_css'); ?>
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo e(url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Organisasi Masyarakat</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action=<?php echo e(route('admin.updateormas', $data->id)); ?>>
          <?php echo e(csrf_field()); ?>

          <div class="box-body">
            <div class="form-group">
              <label>Nama Organisasi Masyarakat</label>
                <input type="text" class="form-control" name="nama" value="<?php echo e($data->datas['nama']); ?>">
            </div>
            <div class="form-group">
              <label>Aktif Mulai Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right"  name="mulai" id="datepicker" value="<?php echo e(\Carbon\Carbon::parse($data->datas['mulai'])->format('d/m/Y')); ?>">
              </div>
            </div>
            <div class="form-group">
                <label>Masa Berlaku</label>
            <input type="text" class="form-control"  maxlength="2" name="masa_berlaku" value="<?php echo e($data->datas['masa_berlaku']); ?>">
            </div>
            
            <!---- ----------------------------->
            
            <div class="form-group">
              <label>Dasar Hukum Pendirian</label>
              <input type="text" class="form-control"  name="dasar_hukum" value="<?php echo e($data->datas['dasar_hukum']); ?>">
            </div>
            <div class="form-group">
              <label>Bidang</label>
              <input type="text" class="form-control"  name="bidang" >
            </div>
            <div class="form-group">
              <label>Status</label>
              <input type="text" class="form-control"  name="status" value="<?php echo e($data->datas['status']); ?>">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control"  name="keterangan" value="<?php echo e($data->datas['keterangan']); ?>">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo e(route('admin.ormas')); ?>" class="btn btn-danger">Kembali</a>
          </div>
        </form>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('add_js'); ?>
<!-- bootstrap datepicker -->
<script src="<?php echo e(url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<script>
    //Date picker
    $('#datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    })
    $('#datepicker1').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    })
</script>
<?php $__env->stopPush(); ?>    
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>