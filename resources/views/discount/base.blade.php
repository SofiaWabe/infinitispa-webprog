@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Discount
      </h1>
      <br>
      <ol class="breadcrumb">
         <li><a href="{{ route('discount.index') }}"><i class="fa fa-tags"></i> Discount </a></li>
         <li class="active">Discount</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection