<?php $__env->startPush('add_css'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">Daftar Surat Rekomendasi Penelitian</h3>
      
      <div class="box-tools">
        <form method="get" action="/riset_admin/search">
          <?php echo e(csrf_field()); ?>

        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="search" class="form-control pull-right" value="<?php echo e(old('search')); ?>" placeholder="Search">

          <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            <a href="/riset_admin/sync" class="btn btn-default">sync</a>
          </div>
        </div>

        </form>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>No Pendaftaran</th>
              <th>No Surat</th>
              <th>Nama Pemohon</th>
              <th>No HP</th>
              <th>Universitas</th>
              <th>Status</th>
              <th>#</th>
              <th>Aksi</th>
              <th>Export</th>
            </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  <tr>
                    <td><?php echo e($data->firstItem() + $key); ?></td>
                    <td>RISET<?php echo e($item->id); ?></td>
                    <td>
                      <?php if($item->nosurat == null): ?>
                      <a class="btn btn-xs btn-primary isi-nomor" data-id="<?php echo e($item->id); ?>" data-toggle="tooltip">Isi Nomor </a>
                      <?php else: ?>
                          
                      <a class="btn btn-xs btn-default edit-nomor" data-nosurat="<?php echo e($item->nosurat); ?>"  data-id="<?php echo e($item->id); ?>" data-toggle="tooltip"><?php echo e($item->nosurat); ?></a>
                      <?php endif; ?>
                    </td>
                    <td><?php echo e(json_decode($item->data)->nama); ?></td>
                    <td><?php echo e(json_decode($item->data)->no_hp); ?></td>
                    <td><?php echo e(json_decode($item->data)->universitas); ?></td>
                    <td><?php echo e($item->status); ?></td>
                    <td><a class="ubah-status" data-id="<?php echo e($item->id); ?>" data-status="<?php echo e($item->status); ?>" data-keterangan="<?php echo e($item->keterangan); ?>"><b>Ubah</b></a></td>
                    <td>
                      <a href="#" class="btn btn-xs btn-primary view-data" data-id="<?php echo e($item->id); ?>" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>
                <a href="/riset_admin/edit/<?php echo e($item->id); ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                <a href="/riset_admin/delete/<?php echo e($item->id); ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?')"><i class="fa fa-trash"></i> </a>
                    </td>
                    <td>
                      <a href="/riset_admin/pdf/<?php echo e($item->id); ?>" target="_blank"  data-toggle="tooltip" title="Cetak"><img src="/assets/pdf.png"></a> 
                      <a href="/storage/<?php echo e(json_decode($item->data)->file); ?>" target="_blank"  data-toggle="tooltip" title="Download Proposal"><img src="/assets/downloads.png"></a> 
                    </td>
                  </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($data->appends(request()->query())->links()); ?>

    </div>
      <!-- /.box-body -->
</div>


<div class="modal fade" id="ubahStatus">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ubah Status </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="post" action=<?php echo e(route('admin.updatestatusriset')); ?>>
                <?php echo e(csrf_field()); ?>

                <input type="hidden" class="form-control" id="iddata" name="iddata">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status" name="status">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="keterangan" name="keterangan">
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
<div class="modal fade" id="isiNomor">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Isi Nomor Surat </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="post" action=<?php echo e(route('admin.isinomor')); ?>>
                <?php echo e(csrf_field()); ?>

                <input type="hidden" class="form-control" id="iddata2" name="iddata2">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nomor Surat</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nosurat" name="nosurat"  maxlength="5" required>
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
<div class="modal fade" id="editNomor">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Nomor Surat </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="post" action=<?php echo e(route('admin.updatenomor')); ?>>
                <?php echo e(csrf_field()); ?>

                <input type="hidden" class="form-control" id="iddata3" name="iddata3">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nomor Surat</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nosuratedit" name="nosuratedit" maxlength="5" required>
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
<div class="modal fade" id="viewRiset">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">View Data Pemohon </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" >
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Item</th>
                      <th>Value</th>
                    </tr>
                    <tr>
                      <td>1.</td>
                      <td>Nama Universitas/Lembaga/Perusahaan</td>
                      <td><label for="viewuniversitas"></label></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Nomor Surat</td>
                      <td><label for="viewnomorsurat" ></label></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Tanggal Surat</td>
                      <td><label for="viewtglsurat" ></label></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Nama</td>
                      <td><label for="viewnama" ></label></td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>NIK/NIP/NIM/NPM</td>
                      <td><label for="viewnik" ></label></td>
                    </tr>
                    <tr>
                      <td>6.</td>
                      <td>Alamat Rumah</td>
                      <td><label for="viewalamat" ></label></td>
                    </tr>
                    <tr>
                      <td>7.</td>
                      <td>No HP</td>
                      <td><label for="viewnohp" ></label></td>
                    </tr>
                    <tr>
                      <td>8.</td>
                      <td>Pekerjaan</td>
                      <td><label for="viewpekerjaan" ></label></td>
                    </tr>
                    <tr>
                      <td>9.</td>
                      <td>Jurusan</td>
                      <td><label for="viewjurusan" ></label></td>
                    </tr>
                    <tr>
                      <td>10.</td>
                      <td>Tujuan</td>
                      <td><label for="viewtujuan" ></label></td>
                    </tr>
                    <tr>
                      <td>11.</td>
                      <td>Data Dalam Rangka</td>
                      <td><label for="viewdalamrangka" ></label></td>
                    </tr>
                    <tr>
                      <td>12.</td>
                      <td>Judul Skripsi/Makalah</td>
                      <td><label for="viewjudul" ></label></td>
                    </tr>
                    <tr>
                      <td>13.</td>
                      <td>Penanggung Jawab</td>
                      <td><label for="viewpenanggungjawab" ></label></td>
                    </tr>
                    <tr>
                      <td>14.</td>
                      <td>Tempat/Objek/Riset</td>
                      <td><label for="viewtempat" ></label></td>
                    </tr>
                    <tr>
                      <td>15.</td>
                      <td>Lama Waktu</td>
                      <td><label for="viewlamawaktu" ></label></td>
                    </tr>
                    <tr>
                      <td>16.</td>
                      <td>Tembusan</td>
                      <td><label for="viewtembusan" ></label></td>
                    </tr>
                  </tbody></table>
                </div>
                <!-- /.box-body -->
              </div>
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
<script src="<?php echo e(asset('asran/riset.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>    
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>