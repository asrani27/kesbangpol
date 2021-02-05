<?php $__env->startSection('konten'); ?>
 <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><div id="totalriset"><?php echo e($totalRiset); ?></div></h3>

              <p>TOTAL REKOMENDASI</p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
          <a href="<?php echo e(url('/riset_admin')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3><div id="totalormas"><?php echo e($totalOrmas); ?></div></h3>
      
                    <p>TOTAL ORMAS</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-group"></i>
                  </div>
                  <a href="<?php echo e(url('/ormas_admin')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
        </div>
              <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><div id="totalpemohon"><?php echo e($totalUser); ?></div></h3>

              <p>TOTAL PEMOHON</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo e(url('/account')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col --> 
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-teal">
              <div class="inner">
                <h3>0<sup style="font-size: 20px"></sup></h3>
  
                <p>TOTAL SPANDUK</p>
              </div>
              <div class="icon">
                <i class="fa fa-bullhorn"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
          
    </div>

    <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- DONUT CHART -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Graphic Chart</h3>
    
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <canvas id="pieChart" style="height:250px"></canvas>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </section>
            <!-- /.Left col -->


            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable"> 
              <!-- Map box -->
              <div class="box box-solid bg-light-blue-gradient">
                <div class="box-header">
                  <h3 class="box-title">
                    Information
                  </h3>
                </div>
                <div class="box-body">
                  
                </div>
              </div>
              <!-- /.box -->    
            </section>
            <!-- right col -->
          </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('add_js'); ?>
<!-- ChartJS -->
<script src="<?php echo e(url('assets/bower_components/chart.js/Chart.js')); ?>"></script>

<script type="text/javascript">
  //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : document.getElementById('totalriset').textContent,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Riset'
      },
      {
        value    : document.getElementById('totalormas').textContent,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'ORMAS'
      },
      {
        value    : document.getElementById('totalpemohon').textContent,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'Account'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
</script>
<?php $__env->stopPush(); ?>    
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>