@extends('therapist.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new therapist</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('therapist.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <!-- Therapist Name -->
                        <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                            <label for="fullname" class="col-md-4 control-label">Therapist Name</label>
                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required autofocus>
                                @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- Position -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Position </label>
                            <div class="col-md-6">
                                <select class="form-control js-type" name="therapistposition_id" required>
                                    <option value="-1">Select position</option>
                                    @foreach ($positions as $position)
                                        <option value="{{$position->id}}">{{$position->therapistposition}}</option>
                                    @endforeach
                                </select>
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

                     <!-- Address -->
                     <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Complete Address</label>
                            <div class="col-md-6">
                                <textarea id="address" class="form-control" name="address" value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
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
