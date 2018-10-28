@extends('room.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update room</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('room.update', ['id' => $room->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- Room Name -->
                        <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
                            <label for="room" class="col-md-4 control-label">Room Name</label>
                            <div class="col-md-6">
                                <input id="room" type="text" class="form-control" name="room" value="{{ $room->room }}" required autofocus>
                                @if ($errors->has('room'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- Capacity -->
                    <div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                            <label for="capacity" class="col-md-4 control-label">Capacity</label>
                            <div class="col-md-6">
                                <input id="capacity" type="text" class="form-control" name="capacity" value="{{ $room->capacity }}">
                                @if ($errors->has('capacity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                    <!-- No. of Rooms -->
                        <div class="form-group{{ $errors->has('noofrooms') ? ' has-error' : '' }}">
                            <label for="noofrooms" class="col-md-4 control-label"> No. of Rooms </label>
                            <div class="col-md-6">
                                <input id="noofrooms" type="text" class="form-control" name="noofrooms" value="{{ $room->noofrooms }}" required>
                                @if ($errors->has('noofrooms'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('noofrooms') }}</strong>
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
