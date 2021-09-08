<?php $__env->startPush('add_css'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<div class="row">
    <div class="col-md-6">
      <button type="button" class="btn btn-warning" onclick="addUser()"><i class="fa fa-plus"></i> Tambah User</button><br /><br />
    </div>
</div>
<div class="box box-warning">
    <div class="box-header">
      <h3 class="box-title">Daftar Pengguna</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Telp</th>
          <th>Role</th>
          <th>Created</th>
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
              <td><?php echo e($dt->name); ?></td>
              <td><?php echo e($dt->email); ?></td>
              <td><?php echo e($dt->username); ?></td>
              <td><?php echo e($dt->roles->first()->name); ?></td>
              <td><?php echo e($dt->created_at); ?></td>
              <td> 
                <button type="button" class="btn btn-xs btn-success edit-user"  data-id="<?php echo e($dt->id); ?>" data-username="<?php echo e($dt->username); ?>"  data-name="<?php echo e($dt->name); ?>" data-email="<?php echo e($dt->email); ?>" data-role="<?php echo e($dt->roles->first()->name); ?>"><i class="fa fa-edit"></i> </button>
                <a href=<?php echo e(url("account/delete/{$dt->id}")); ?> class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
       </table>
    </div>
      <!-- /.box-body -->
</div>

<div class="modal fade" id="addUser">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah User </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="post" action=<?php echo e(route('admin.saveaccount')); ?>>
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" placeholder="nama">
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Telp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  id="username" name="username" maxlength="15" placeholder="08xxxxxxx">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Role</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" name="role">
                      <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($r->id == 2): ?>
                        <option value="<?php echo e($r->id); ?>" selected><?php echo e($r->name); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($r->id); ?>"><?php echo e($r->name); ?></option>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
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

<div class="modal fade" id="editUser">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit User </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="post" action=<?php echo e(route('admin.editaccount')); ?>>
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">     
                      <input type="hidden" class="form-control" id="idedit" name="idedit">
                      <input type="text" class="form-control" id="name" name="name" placeholder="nama">
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="editemail" name="email" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="editpassword" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Telp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  id="editusername" name="username" maxlength="15" placeholder="08xxxxxxx">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Role</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" name="role" id="role">
                      <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($r->id == 2): ?>
                        <option value="<?php echo e($r->id); ?>" selected><?php echo e($r->name); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($r->id); ?>"><?php echo e($r->name); ?></option>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                   Note : Login menggunakan email<br />
                   Biarkan Pass kosong jika tidak ingin diganti
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
  
  function addUser()
  {
    document.getElementById("inputEmail3").value = "";
    document.getElementById("inputPassword3").value = "";
    $('#addUser').modal('show');
    document.getElementById("inputEmail3").value = "";
    document.getElementById("username").value = "";
    document.getElementById("inputPassword3").value = "";
  }

  $(document).on('click', '.edit-user', function() {
    $('#idedit').val($(this).data('id'));
    $('#name').val($(this).data('name'));
    $('#editemail').val($(this).data('email'));
    $('#editusername').val($(this).data('username'));
    $('#role').empty();
    var role = $(this).data('role');
    $.ajax({
                type: "GET",
                url: "<?php echo e(route('role')); ?>",
                success: function(resp){
                  option = "";
                  for (i=0; i<resp.length; i++) {
                    if(resp[i].name === role)
                    {
                      option += "<option value='" + resp[i].id + "' selected>" + resp[i].name + "</option>";
                    }
                    else
                    {
                      option += "<option value='" + resp[i].id + "'>" + resp[i].name + "</option>";
                    }
                  }
                  $('#role').html(option);
                }
            });
    document.getElementById("editpassword").value = "";
    $('#editUser').modal('show');
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