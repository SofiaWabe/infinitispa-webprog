@extends('room.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new room</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('room.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <!-- Room Name -->
                        <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
                            <label for="room" class="col-md-4 control-label">Room Name</label>
                            <div class="col-md-6">
                                <input id="room" type="text" class="form-control" name="room" value="{{ old('room') }}" required autofocus>
                                @if ($errors->has('room'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                     <!-- Capacity -->
                        <div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                            <label for="capacity" class="col-md-4 control-label">Capactiy</label>
                            <div class="col-md-6">
                                <input type="text" id="capacity" class="form-control" name="capacity" value="{{ old('capacity') }}">
                                @if ($errors->has('capacity'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                                @endif
                                </textarea>
                            </div>
                        </div>

                    <!-- Number of Rooms -->
                    <div class="form-group{{ $errors->has('noofrooms') ? ' has-error' : '' }}">
                            <label for="noofrooms" class="col-md-4 control-label">No. of Rooms</label>
                            <div class="col-md-6">
                                <input type="text" id="noofrooms" class="form-control" name="noofrooms" value="{{ old('noofrooms') }}">
                                @if ($errors->has('noofrooms'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('noofrooms') }}</strong>
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
