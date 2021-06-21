<?php $__env->startPush('add_css'); ?>
<link rel="stylesheet" href="<?php echo e(url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">

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
          <h3 class="box-title">Edit Layanan</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action=<?php echo e(route('admin.updatelayanan', $data->id)); ?>>
          <?php echo e(csrf_field()); ?>

          <div class="box-body">
            <div class="form-group">
              <label>Nama Layanan</label>
            <input type="text" class="form-control" name="nama" value="<?php echo e($data->nama); ?>">
            </div>
            <div class="form-group"> 
                <label>Isi / Deskripsi</label>
                <textarea  id="summernote" name="isi" rows="10" cols="80">
                        <?php echo e($data->isi); ?>

                </textarea>
            </div>
            <div class="form-group">
                    <label>Publish</label>
                    <select class="form-control" name="publish">
                        <?php if($data->publish == 'Ya'): ?>
                        <option value="Ya" selected>Ya</option>
                        <option value="Tidak" >Tidak</option>
                        <?php else: ?>
                        <option value="Ya" >Ya</option>
                        <option value="Tidak" selected>Tidak</option>
                        <?php endif; ?>
                    </select>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo e(route('admin.layanan')); ?>" class="btn btn-danger">Kembali</a>
          </div>
        </form>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('add_js'); ?>
<!-- CK Editor -->
<script src="<?php echo e(url('assets/bower_components/ckeditor/ckeditor.js')); ?>"></script>

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
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>

<?php $__env->stopPush(); ?>    
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>