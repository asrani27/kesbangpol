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
          <h3 class="box-title">Artikel</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action=<?php echo e(route('admin.saveartikel')); ?> enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="box-body">
            <div class="form-group">
              <label>Judul</label>
            <input type="text" class="form-control" name="judul" required>
            </div>
            <div class="form-group"> 
                <label>Isi / Deskripsi</label>
                <textarea id="editor1" name="isi" rows="10" cols="80" required>
                    
                </textarea>
            </div>
            <div class="form-group">
                    <label>Publish</label>
                    <select class="form-control" name="publish">
                        <option value="Ya" selected>Ya</option>
                        <option value="Tidak" >Tidak</option>
                    </select>
            </div>
            
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="file" required>
        </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo e(route('admin.artikel')); ?>" class="btn btn-danger">Kembali</a>
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
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
  })
</script>

<?php $__env->stopPush(); ?>    
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>