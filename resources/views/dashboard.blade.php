
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
   <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
   <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
  @include('layouts.header')
  <!-- Sidebar -->
  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
         <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <br><br>
    <div class="col-md-24">
        <div class="col-lg-4 col-xs-6">
            <div class="panel" style="border-left:8px solid #FF6384;color:#FF6384; cursor:pointer">   
                <div class="panel-body">
                  <a href="{{ url('appointment') }}">
                    <?php
                      $TotalAppointment = DB::table('reservation')->where('status', '=', "Accepted")->count();
                    ?>
                    <div class="info-box-number text-center" style="font-size:70px; color:#FF6384" >{{ $TotalAppointment }}</div>
                    <div class="info-box-text text-center" style="font-size:130%; color:#FF6384">APPOINTMENTS</div>
                  </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6">
            <div class="panel" style="border-left:8px solid #FFCE56;color:#FFCE56; cursor:pointer">
                <div class="panel-body"> 
                  <a href="{{ url('reservation') }}">
                    <?php
                      $TotalReservation = DB::table('reservation')->where('status', '=', "Pending")->count();
                    ?>
                    <div class="info-box-number text-center" style="font-size:70px;color:#FFCE56">{{ $TotalReservation }}</div>
                    <div class="info-box-text text-center" style="font-size:130%;color:#FFCE56">RESERVATIONS</div>
                  </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6">
            <div class="panel" style="border-left:8px solid #72AFD2;color:#72AFD2; cursor:pointer">
                <div class="panel-body">
                  <a href="{{ url('walk-ins') }}">
                    <?php
                      $TotalWalkIn = DB::table('walkin')->count();
                    ?>
                    <div class="info-box-number text-center" style="font-size:70px">{{ $TotalWalkIn }}</div>
                    <div class="info-box-text text-center" style="font-size:130%">WALK-INS</div>
                </div>
            </div>
        </div>
          

          <!-- TABLE FOR COUNT OF APPOINTMENTS -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Today's Appointments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Services</th>
                        <th>Therapist</th>
                        <th>Room</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
        </section>
          <!-- END OF TABLE FOR COUNT OF HOSPITAL -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

 <!-- jQuery 2.1.3 -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>

<!-- FLOT CHARTS -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/flot/jquery.flot.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/flot/jquery.flot.js") }}" type="text/javascript"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/flot/jquery.flot.resize.js") }}" type="text/javascript"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/flot/jquery.flot.pie.js") }}" type="text/javascript"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/flot/jquery.flot.categories.js") }}" type="text/javascript"></script>

<!-- DataTables -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}" type="text/javascript"></script>



<!-- /. REQUIRED JS SCRIPTS -->

<script>
$ (function(){
    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
      { label: 'Luzon', data: 30, color: '#3c8dbc' },
      { label: 'Visayas', data: 20, color: '#0073b7' },
      { label: 'Mindanao', data: 50, color: '#00c0ef' }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>' 
      + Math.round(series.percent) + '%</div>'
  }
</script>

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

</body>
</html>
