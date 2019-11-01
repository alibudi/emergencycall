<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="pull-right hidden-xs">
    Doraemon Team
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2018 <a href="#">Doraemon Apps</a>.</strong> All rights reserved.
</footer>


<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url()?>assets/Chart.js/Chart.js"></script>
<!-- DataTables JavaScript -->
<script src="<?php echo base_url()?>assest/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assest/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assest/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- SweetAlert 2-->
<script src="<?php echo base_url('assest/vendor/sweetalert/sweetalert2.min.js');?>"></script>
<!--<script src="<?php // echo base_url('assest/vendor/sweetalert/sweetalert2.common.min.js');?>"></script>-->

<script src="<?php echo base_url('assets/js/raphael-min.js');?>"></script>
<script src="<?php echo base_url('assets/morris/morris.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/adminlte.min.js');?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
        responsive: true
    });
});
</script>
<script>
  $(function () {

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>
</body>
</html>