@extends('therapist.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update therapist</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('therapist.update', ['id' => $therapist->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- Full Name -->
                        <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                            <label for="fullname" class="col-md-4 control-label">Full Name</label>
                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control" name="fullname" value="{{ $therapist->fullname }}" required autofocus>
                                @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- Position -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Position</label>
                            <div class="col-md-6">
                                <select class="form-control" name="therapistposition_id" required>
                                <option value="-1">Select position</option>
                                    @foreach ($positions as $position)
                                        <option {{$therapist->therapistposition_id == $position->id ? 'selected' : ''}} value="{{$position->id}}">{{$position->therapistposition}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <!-- Contact Number -->
                    <div class="form-group{{ $errors->has('contactnumber') ? ' has-error' : '' }}">
                            <label for="contactnumber" class="col-md-4 control-label">Contact Number</label>
                            <div class="col-md-6">
                                <input id="contactnumber" type="text" class="form-control" name="contactnumber" value="{{ $therapist->contactnumber }}">
                                @if ($errors->has('contactnumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contactnumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- Email Address -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email Address</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ $therapist->email }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                    <!-- Address -->
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label"> Complete Address </label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $therapist->address }}" required>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
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
