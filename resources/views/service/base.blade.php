@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Service
      </h1>
      <br>
      <ol class="breadcrumb">
         <li><a href="{{ route('service.index') }}"><i class="fa fa-cogs"></i> Services </a></li>
         <li class="active">Service</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection