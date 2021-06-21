<?php $__env->startPush('add_css'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<a href="<?php echo e(route('admin.addormas')); ?>" class="btn btn btn-success"><i class="fa fa-plus"></i>  Tambah Data Ormas</a> 
<br /><br />
<div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Daftar ORMAS</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Ormas</th>
          <th>Aktif</th>
          <th>Masa Berlaku</th>
          <th>Dasar Hukum Pendirian</th>
          <th>Bidang</th>
          <th>Status</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <?php
        $no = 1;
        ?>
        <tbody>
          <?php $__currentLoopData = $d; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <td><?php echo e($no++); ?></td>
              <td><?php echo e($dt->datas['nama']); ?></td>
              <td><?php echo e(\Carbon\Carbon::parse($dt->datas['mulai'])->format('d-M-Y')); ?> Sampai <?php echo e(\Carbon\Carbon::parse($dt->datas['sampai'])->format('d-M-Y')); ?></td>
              <td><?php echo e($dt->datas['masa_berlaku']); ?> Tahun</td>
              <td><?php echo e($dt->datas['dasar_hukum']); ?></td>
              <td><?php echo e($dt->datas['bidang']); ?></td>
              <td><?php echo e($dt->datas['status']); ?></td>
              <td><?php echo e($dt->datas['keterangan']); ?></td>
              <td>
                  <a href=<?php echo e(url("ormas_admin/galery/{$dt->id}")); ?> class="btn btn-xs btn-primary" data-toggle="tooltip" title="Galery"><i class="fa fa-camera"></i> </a>
                  <a href=<?php echo e(url("ormas_admin/edit/{$dt->id}")); ?> class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                  <a href=<?php echo e(url("ormas_admin/delete/{$dt->id}")); ?> class="btn btn-xs btn-danger"  data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
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