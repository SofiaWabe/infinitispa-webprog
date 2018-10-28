@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Therapist Position
      </h1>
      <br>
      <ol class="breadcrumb">
         <li><a href="{{ route('therapist-position.index') }}"><i class="fa fa-group"></i> Therapist </a></li>
         <li class="active">Therapist Position</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection