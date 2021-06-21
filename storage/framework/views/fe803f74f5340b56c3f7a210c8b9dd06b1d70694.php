<?php $__env->startSection('navbar-transparan'); ?>
<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br /><br />
<div id="profil" class="content" data-scrollview="true">
    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInDown">
        <h2 class="content-title">Organisasi Masyarakat Terdaftar</h2>
        <!-- begin row -->
        <div class="row">
           
<table id="example" class="display" style="width:100%">
    <thead>
            <tr>
                    <th>No</th>
                    <th>Nama Ormas</th>
                    <th>Dasar Hukum Pendirian</th>
                    <th>Bidang</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th></th>
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
                <td><?php echo e($dt->datas['dasar_hukum']); ?></td>
                <td><?php echo e($dt->datas['bidang']); ?></td>
                <td><?php echo e($dt->datas['status']); ?></td>
                <td><?php echo e($dt->datas['keterangan']); ?></td>
                <td>
                    <a href=<?php echo e(url("galery/album/{$dt->id}")); ?>><b>Galery </b></a>
                </td>
              </tr>      
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
    </tfoot>
</table>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<script>
$(document).ready( function () {
    $('#example').DataTable();
} );
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('color.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>