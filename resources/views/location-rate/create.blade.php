@extends('therapist.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new home service rate</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('location-rate.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <!-- Service -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Service </label>
                            <div class="col-md-6">
                                <select class="form-control js-service" name="service_id" required>
                                    <option value="-1">Select a service</option>
                                    @foreach ($services as $service)
                                        <option value="{{$service->id}}">{{$service->servicename}} - {{ $service->duration }} mins</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <!-- City -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"> City </label>
                            <div class="col-md-6">
                                <select class="form-control js-city" name="city" required>
                                    <option value="-1">Select a city</option>
                                    <option value="Pasig">Pasig City</option>
                                    <option value="Quezon City">Quezon City</option>
                                </select>
                            </div>
                        </div>
                    
                    <!-- Barangay -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Barangay </label>
                            <div class="col-md-6">
                                <select class="form-control js-barangay" name="barangay" required>
                                    <option value="-1">Select a barangay</option>
                                    <option value="1">Barangay 1</option>
                                    <option value="2">Barangay 2</option>
                                </select>
                            </div>
                        </div>

                     <!-- Location Rate -->
                        <div class="form-group{{ $errors->has('locationrate') ? ' has-error' : '' }}">
                            <label for="locationrate" class="col-md-4 control-label">Price</label>
                            <div class="col-md-6">
                                <input type="text" id="locationrate" class="form-control" name="locationrate" value="{{ old('locationrate') }}">
                                @if ($errors->has('locationrate'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('locationrate') }}</strong>
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
