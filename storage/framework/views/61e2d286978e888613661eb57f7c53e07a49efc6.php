<?php $__env->startSection('navbar-transparan'); ?>
<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br /><br />
<div id="profil" class="content" data-scrollview="true">
    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInDown">
        <h2 class="content-title">Dokumen : <?php echo e($kat->nama); ?></h2>
        <!-- begin row -->
        <div class="row">
           
<table id="example" class="display" style="width:100%">
    <thead>
            <tr>
                    <th>No</th>
                    <th>Type</th>
                    <th>Judul</th>
                    <th>Size</th>
                    <th>#</th>
                  </tr>
    </thead>
    <?php
    $no = 1;
    ?>
    <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="10px"><?php echo e($no++); ?></td>
                <td width="10px">
                    <?php if($dt->jenis == 'zip'): ?>
                    <img src="https://cdn0.iconfinder.com/data/icons/fatcow/32/file_extension_zip.png">
                    <?php elseif($dt->jenis == 'pdf'): ?>
                    <img src="https://cdn0.iconfinder.com/data/icons/fatcow/32x32/file_extension_pdf.png">
                    <?php elseif($dt->jenis == 'ppt'): ?>
                    <img src="https://cdn1.iconfinder.com/data/icons/Momentum_MatteEntireSet/32/ppt.png">
                    <?php elseif($dt->jenis == 'png'): ?>
                    <img src="https://cdn0.iconfinder.com/data/icons/fatcow/32/file_extension_png.png">
                    <?php elseif($dt->jenis == 'docx' OR 'doc'): ?>
                    <img src="https://cdn0.iconfinder.com/data/icons/fatcow/32/file_extension_doc.png">
                    <?php elseif($dt->jenis == 'rar'): ?>
                    <img src="https://cdn0.iconfinder.com/data/icons/fatcow/32/file_extension_rar.png">
                    <?php else: ?>
                    <?php echo e($dt->jenis); ?>

                    <?php endif; ?>
                </td>
                <td><?php echo e($dt->judul); ?></td>
                <td><?php echo e($dt->size); ?> MB</td>
                <td>
                    <a href=<?php echo e(url('storage', $dt->filename)); ?>><b>Unduh </b></a>
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