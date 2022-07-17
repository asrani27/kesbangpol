<?php $__env->startPush('add_css'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<a href="<?php echo e(url('artikel/add')); ?>" class="btn btn btn-success"><i class="fa fa-plus"></i> Tambah Artikel</a>
<br /><br />
<div class="box box-danger">
  <div class="box-header">
    <h3 class="box-title">Artikel</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th></th>
          <th>Judul Artikel</th>
          <th>Publish</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php
        $no = 1;
        ?>
      <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($no++); ?></td>
          <td><img src="/storage/artikel/<?php echo e($dt->gambar); ?>" width="100px">
            <img
              src="<?php echo e(Thumbnail::src('/05-02-2021-8179screencapture-localhost-8000-report-2021-02-04-23_41_31.png', 'public')->smartcrop(200, 200)->url()); ?>">
          </td>
          <td><?php echo e($dt->judul); ?></td>
          <td><?php echo e($dt->publish); ?></td>
          <td>
            <a href=<?php echo e(url("artikel/edit/{$dt->id}")); ?> class="btn btn-xs btn-warning" data-toggle="tooltip"
              title="Edit"><i class="fa fa-edit"></i> </a>
            <a href=<?php echo e(url("artikel/delete/{$dt->id}")); ?> class="btn btn-xs btn-danger" data-toggle="tooltip"
              title="Hapus" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i>
            </a>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('add_js'); ?>

<!-- DataTables -->
<script src="<?php echo e(url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>

<script>
  $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>