@extends('service.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new service</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <!-- Service Name -->
                        <div class="form-group{{ $errors->has('servicename') ? ' has-error' : '' }}">
                            <label for="servicename" class="col-md-4 control-label">Service Name</label>
                            <div class="col-md-6">
                                <input id="servicename" type="text" class="form-control" name="servicename" value="{{ old('servicename') }}" required autofocus>
                                @if ($errors->has('servicename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('servicename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- Service Type -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Service Type </label>
                            <div class="col-md-6">
                                <select class="form-control js-type" name="servicetype_id" required>
                                    <option value="-1">Select type</option>
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->servicetypename}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <!-- Service Price -->
                        <div class="form-group{{ $errors->has('serviceprice') ? ' has-error' : '' }}">
                            <label for="serviceprice" class="col-md-4 control-label">Price</label>
                            <div class="col-md-6">
                                <input id="serviceprice" type="text" class="form-control" name="serviceprice" value="{{ old('serviceprice') }}" required autofocus>
                                @if ($errors->has('serviceprice'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('serviceprice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                     <!-- Description -->
                     <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" value="{{ old('description') }}">
                                @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                                </textarea>
                            </div>
                        </div>


                    <!-- Create Button -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
