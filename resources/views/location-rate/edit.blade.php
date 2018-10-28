@extends('location-rate.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update home service rate</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('location-rate.update', ['id' => $rate->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- Service -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Service</label>
                            <div class="col-md-6">
                                <select class="form-control" name="service_id" required>
                                <option value="-1">Select a service</option>
                                    @foreach ($services as $service)
                                        <option {{$rate->service_id== $service->id ? 'selected' : ''}} value="{{$service->id}}">{{$service->servicename}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                    <!-- City -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">City</label>
                            <div class="col-md-6">
                                <select class="form-control" name="city" required>
                                <option value="-1">Select a city</option>
                                    @foreach ($rates as $rate)
                                        <option {{$rate->service_id== $service->id ? 'selected' : ''}} value="{{$rate->id}}">{{$service->city}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <!-- Barangay -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Barangay</label>
                            <div class="col-md-6">
                                <select class="form-control" name="barangay" required>
                                <option value="-1">Select a barangay</option>
                                    @foreach ($rates as $rate)
                                        <option {{$rate->service_id== $service->id ? 'selected' : ''}} value="{{$rate->id}}">{{$service->barangay}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <!-- Location Rate -->
                    <div class="form-group{{ $errors->has('locationrate') ? ' has-error' : '' }}">
                            <label for="locationrate" class="col-md-4 control-label">Location Rate</label>
                            <div class="col-md-6">
                                <input id="locationrate" type="text" class="form-control" name="locationrate" value="{{ $rate->locationrate }}">
                                @if ($errors->has('locationrate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('locationrate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- Update Button -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
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
