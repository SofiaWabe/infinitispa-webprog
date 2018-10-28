@extends('appointment.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Assign therapist and room</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('appointment.update', ['id' => $appointment->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- Therapist -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Therapists</label>
                            <div class="col-md-6">
                                <select class="form-control" name="therapist_id" required>
                                <option value="-1">Select a therapist</option>
                                    @foreach ($therapists as $therapist)
                                        <option {{$appointment->therapist_id== $therapist->id ? 'selected' : ''}} value="{{$therapist->id}}">{{$therapist->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                    <!-- Room -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Room</label>
                            <div class="col-md-6">
                                <select class="form-control" name="room_id" required>
                                <option value="-1">Select a city</option>
                                    @foreach ($rooms as $room)
                                        <option {{$appointment->service_id== $service->id ? 'selected' : ''}} value="{{$rate->id}}">{{$service->city}}</option>
                                    @endforeach
                                </select>
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
