<?php $__env->startPush('add_css'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<a href="<?php echo e(route('admin.addpejabat')); ?>" class="btn btn btn-success"><i class="fa fa-plus"></i>  Tambah Pejabat</a> 
<br /><br />
<div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Daftar Pejabat</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Pangkat</th>
          <th>Gunakan</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <?php
        $no = 1;
        ?>
        <tbody>
          <?php $__currentLoopData = $p; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <td><?php echo e($no++); ?></td>
              <td><?php echo e($dt->data['nip']); ?></td>  
              <td><?php echo e($dt->data['nama']); ?></td>
              <td><?php echo e($dt->data['jabatan']); ?></td>
              <td><?php echo e($dt->data['pangkat']); ?></td>
              <td>
                <?php if($dt->status == 'Y'): ?>  
                <small class="label bg-green"><i class="fa fa-check"></i>  Ya</small>
                 <?php else: ?>
                 <small class="label bg-red"><i class="fa fa-close"></i>  Tidak</small>
                 <?php endif; ?>
            
                </td>
              <td> 
                    <?php if($dt->status == 'Y'): ?>  
                    <a href=<?php echo e(url("pejabat/edit/{$dt->id}")); ?> class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                    <?php else: ?>
                    <a href=<?php echo e(url("pejabat/aktif/{$dt->id}")); ?> class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit">Aktifkan </a>
                    <a href=<?php echo e(url("pejabat/edit/{$dt->id}")); ?> class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                    <a href=<?php echo e(url("pejabat/delete/{$dt->id}")); ?> class="btn btn-xs btn-danger"  data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>  
             
                    <?php endif; ?>
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