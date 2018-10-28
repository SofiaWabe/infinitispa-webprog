@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reservation
      </h1>
      <br>
      <ol class="breadcrumb">
         <li><a href="{{ route('reservation.index') }}"><i class="fa fa-pencil-square"></i>Reservation</a></li>
         <li class="active">Reservation</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection