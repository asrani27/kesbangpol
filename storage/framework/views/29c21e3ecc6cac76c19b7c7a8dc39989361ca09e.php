<?php $__env->startPush('add_css'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<div class="row">
    <div class="col-md-6">
      <button type="button" class="btn btn-warning" onclick="addKategori()"><i class="fa fa-plus"></i> Tambah Kategori</button><br /><br />
    </div>
</div>
<div class="box box-warning">
    <div class="box-header">
      <h3 class="box-title">Kategori Dokumen</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Kategori</th>
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
              <td> 
                <button type="button" class="btn btn-xs btn-success edit-kategori"  data-id="<?php echo e($dt->id); ?>" data-nama="<?php echo e($dt->nama); ?>"><i class="fa fa-edit"></i> </button>
                <a href=<?php echo e(url("kategori/delete/{$dt->id}")); ?> class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
       </table>
    </div>
      <!-- /.box-body -->
</div>

<div class="modal fade" id="addKategori">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Kategori </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="post" action=<?php echo e(route('admin.savekategori')); ?>>
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Kategori</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="nama" id="tambahkategori" required>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="editKategori">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Kategori </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="post" action=<?php echo e(route('admin.editkategori')); ?>>
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Kategori</label>
                    <div class="col-sm-10">     
                      <input type="hidden" class="form-control" id="idedit" name="idedit">
                      <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('add_js'); ?>

<!-- DataTables -->
<script src="<?php echo e(url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>

<script>
  
  function addKategori()
  {
    document.getElementById("tambahkategori").value = "";
    $('#addKategori').modal('show');
  }

  $(document).on('click', '.edit-kategori', function() {
    $('#idedit').val($(this).data('id'));
    $('#nama').val($(this).data('nama'));
    $('#editKategori').modal('show');
  });

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