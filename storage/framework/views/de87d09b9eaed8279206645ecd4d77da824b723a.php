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
          <h3 class="box-title">Edit Pejabat</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action=<?php echo e(route('admin.updatepejabat', $data->id)); ?>>
          <?php echo e(csrf_field()); ?>

          <div class="box-body">
            <!---- ----------------------------->
            <div class="form-group">
                <label>NIP</label>
                <input type="text" class="form-control" name="nip" value="<?php echo e($data->data['nip']); ?>">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control"  name="nama" value="<?php echo e($data->data['nama']); ?>">
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" class="form-control" name="jabatan" value="<?php echo e($data->data['jabatan']); ?>">
            </div>
            <div class="form-group">
                <label>Pangkat</label>
                <input type="text" class="form-control" name="pangkat" value="<?php echo e($data->data['pangkat']); ?>">
            </div>
        
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo e(route('admin.pejabat')); ?>" class="btn btn-danger">Kembali</a>
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
      autoclose: true
    })
</script>
<?php $__env->stopPush(); ?>    
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>