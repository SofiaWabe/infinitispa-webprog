@extends('reservation.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Make a reservation</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('reservation.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <!-- First Name -->
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>
                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- Last Name -->
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                     <!-- Contact Number -->
                     <div class="form-group{{ $errors->has('contactnumber') ? ' has-error' : '' }}">
                            <label for="contactnumber" class="col-md-4 control-label">Contact Number</label>
                            <div class="col-md-6">
                                <input type="text" id="contactnumber" class="form-control" name="contactnumber" value="{{ old('contactnumber') }}">
                                @if ($errors->has('contactnumber'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('contactnumber') }}</strong>
                                    </span>
                                @endif
                                </textarea>
                            </div>
                        </div>
                    
                    <!-- Address -->
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                    <!-- Service -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Service </label>
                            <div class="col-md-6">
                                <select class="form-control js-type" name="servicetype_id" required>
                                    <option value="-1">Select a service</option>
                                    @foreach ($services as $service)
                                        <option value="{{$service->id}}">{{$service->servicename}} - {{ $service->duration }} mins.</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <!-- Number of head -->
                    <div class="form-group{{ $errors->has('numberhead') ? ' has-error' : '' }}">
                            <label for="numberhead" class="col-md-4 control-label">Number of head</label>
                            <div class="col-md-6">
                                <input id="numberhead" type="number" class="form-control" name="numberhead" value="{{ old('numberhead') }}" required autofocus>
                                @if ($errors->has('numberhead'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numberhead') }}</strong>
                                    </span>
                                @endif
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
