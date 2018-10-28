@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Room
      </h1>
      <br>
      <ol class="breadcrumb">
         <li><a href="{{ route('room.index') }}"><i class="fa fa-home"></i> Room </a></li>
         <li class="active">Room</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection