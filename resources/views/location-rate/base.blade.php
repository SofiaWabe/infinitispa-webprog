@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home Service Rate
      </h1>
      <br>
      <ol class="breadcrumb">
         <li><a href="{{ route('location-rate.index') }}"><i class="fa fa-map-marker"></i> Home Service Rate </a></li>
         <li class="active">Home Service Rate</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection