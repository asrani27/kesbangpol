<?php $__env->startPush('add_css'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>

<br />
<div class="box box-danger">
  <div class="box-header">
    <h3 class="box-title">Bidang</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Bidang</th>
          <th>username</th>
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
          <td><?php echo e($dt->nama); ?></td>
          <td><?php echo e($dt->user == null ? '': $dt->user->username); ?></td>
          <td>
            <?php if($dt->user == null): ?>
            <a href="/bidang/akun/<?php echo e($dt->id); ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Buat Akun"><i
                class="fa fa-key"></i> Buat Akun</a>
            <?php else: ?>
            <a href="/bidang/reset/<?php echo e($dt->id); ?>" class="btn btn-xs btn-info" data-toggle="tooltip" title="Reset Pass"><i
                class="fa fa-key"></i> Reset Pass</a>
            <?php endif; ?>
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