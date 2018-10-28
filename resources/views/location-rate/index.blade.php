<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home Service Rate</title>
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
        Home Service Rate
      </h1>
      <br>
      <ol class="breadcrumb">
         <li><a href="{{ route('location-rate.index') }}"><i class="fa fa-group"></i> Home Service Rate </a></li>
         <li class="active">Home Service Rate</li>
      </ol>
    </section>

    <!-- Main content -->
          
<!-- TABLE FOR COUNT OF MEMBERS  -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Home Service Rate</h3>
                  <div class="col-xs-12" style="text-align:right">
                 <a class="btn btn-primary" href="{{ route('location-rate.create') }}"> Add New Home Service Rate </a>
                </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Service</th>
                      <th>Location</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($rates as $rate)
                          <tr role="row" class="odd">
                            <td class="hidden-xs">{{ $rate->id }} </td>
                            <td class="hidden-xs">{{ $rate->servicename}} - {{ $rate->duration }} mins</td>
                            <td class="hidden-xs">
                              <ul>
                                @foreach($locations as $location)
                                  @if($rate->service_id == $location->service_id)
                                    <li>{{ $location->barangay}}, {{ $location->city }}</li>
                                  @endif
                                @endforeach
                              </ul>
                            </td>
                            <td class="hidden-xs">{{ $rate->locationrate}}</td>
                            <td>
                              <form class="row" method="POST" action="{{ route('location-rate.destroy', ['id' => $rate->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                  <input type="hidden" name="_method" value="DELETE">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <a href="{{ route('location-rate.edit', ['id' => $rate->id]) }}" class="btn btn-warning btn-sm edit" data-toggle="tooltip" title="" data-original-title="Update"><i class="glyphicon glyphicon-edit"></i></a>
                                  <button class="btn btn-danger btn-sm delRate" data-toggle="tooltip" title="" data-original-title="Delete"><i class="glyphicon glyphicon-trash"></i></button>
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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
