@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Walk-In
      </h1>
      <br>
      <ol class="breadcrumb">
         <li><a href="{{ route('walk-in.index') }}"><i class="fa fa-female"></i>Walk-In</a></li>
         <li class="active">Walk-In</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection