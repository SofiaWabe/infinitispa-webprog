@extends('walk-in.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new walk in appointment</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('walk-in.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <!-- Full Name -->
                            <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                                <label for="fullname" class="col-md-4 control-label">First Name</label>
                                <div class="col-md-6">
                                    <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required autofocus>
                                    @if ($errors->has('fullname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fullname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <!-- Email Address -->
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                    <!-- Contact Number -->
                        <div class="form-group{{ $errors->has('contactnumber') ? ' has-error' : '' }}">
                            <label for="contactnumber" class="col-md-4 control-label">Contact Number</label>
                            <div class="col-md-6">
                                <input id="contactnumber" type="text" class="form-control" name="contactnumber" value="{{ old('contactnumber') }}" required autofocus>
                                @if ($errors->has('contactnumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contactnumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Service -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Service </label>
                            <div class="col-md-6">
                                <select class="form-control js-type" name="therapist_id" required>
                                    <option value="-1">Select service</option>
                                    @foreach ($services as $service)
                                        <option value="{{$service->id}}">{{$service->servicename}} - {{ $service->duration }} mins.</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <!-- Therapist -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Therapist </label>
                            <div class="col-md-6">
                                <select class="form-control js-type" name="therapist_id" required>
                                    <option value="-1">Select therapist</option>
                                    @foreach ($therapists as $therapist)
                                        <option value="{{$therapist->id}}">{{$therapist->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                    <!-- Room -->
                    <div class="form-group">
                            <label class="col-md-4 control-label"> Room </label>
                            <div class="col-md-6">
                                <select class="form-control js-type" name="room_id" required>
                                    <option value="-1">Select a room</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{$room->id}}">{{$room->room}}</option>
                                    @endforeach
                                </select>
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
