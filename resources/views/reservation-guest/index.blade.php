<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reservation</title>
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
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
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
      <h1>
        Reservation
      </h1>
      <br>
      <ol class="breadcrumb">
         <li><a href="{{ route('reservation.index') }}"><i class="fa fa-pencil-square"></i> Reservation </a></li>
         <li class="active">Reservation</li>
      </ol>
    </section>

    <!-- Main content -->
          
<!-- TABLE FOR COUNT OF MEMBERS  -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Reservation</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="reservation" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Reservation Date</th>
                      <th>Customer Name</th>
                      <th>Services</th>
                      <th>Appointment Date</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($reservations as $reservation)
                          <tr role="row" class="odd">
                            <td class="hidden-xs">
                              <?php
                                $date = date('F d, Y h:i:s', strtotime($reservation->reservation_date));
                                echo $date;
                              ?>
                            </td>
                            <td class="hidden-xs">{{ $reservation->firstname}} {{ $reservation->lastname }}</td>
                            <td class="hidden-xs">
                              <ul>
                                @foreach($services as $service)
                                  @if($reservation->id == $service->reservation_id)
                                    <li>{{ $service->servicename}} - {{ $service->duration }} mins.</li>
                                  @endif
                                @endforeach
                              <ul>
                            </td>
                            <td class="hidden-xs">
                              <?php
                                $date = date('F d, Y h:i:s', strtotime($reservation->appointment_date));
                                echo $date;
                              ?>
                            </td>
                            <td class="hidden-xs">Php {{ $reservation->price }}</td>
                            <td class="hidden-xs">{{ $reservation->status}}</td>
                            <td>
                              <form class="row" method="PATCH" action="{{ route('reservation.update', ['id' => $reservation->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                  <input type="hidden" name="_method" value="ACCEPT">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button type="submit" class="btn btn-warning btn-sm edit" data-toggle="tooltip" title="" data-original-title="Accept"><i class="fa fa-thumbs-up"></i></button>
                              </form>
                              <form class="row" method="POST" action="{{ route('reservation.destroy', ['id' => $reservation->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                  <input type="hidden" name="_method" value="DELETE">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button class="btn btn-danger btn-sm delReserve" data-toggle="tooltip" title="" data-original-title="Decline"><i class="fa fa-thumbs-down"></i></button>
                              </form>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan=7 style="text-align:center; letter-spacing:4px"><i>End of record</i></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
        </section>
          <!-- END OF TABLE FOR COUNT OF MEMBERS -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

 <!-- jQuery 2.1.3 -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>

<!-- DataTables -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}" type="text/javascript"></script>



<!-- /. REQUIRED JS SCRIPTS -->
<script>
  $(function () {
    $('#reservation').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
</body>
</html>
