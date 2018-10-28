@extends('reservation.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Are you sure?</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('reservation.update', ['id' => $reservation->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- Appointment Date -->
                        <div class="form-group{{ $errors->has('appointment_date') ? ' has-error' : '' }}">
                            <label for="appointment_date" class="col-md-4 control-label">Appointment Date</label>
                            <div class="col-md-6">
                                <input id="appointment_date" type="text" class="form-control" name="appointment_date" value="{{ $reservation->appointment_date }}">
                                @if ($errors->has('appointment_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('appointment_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- Update Button -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Approve
                                </button>
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-primary">
                                    <a href="{{ url('reservation') }}">
                                        Cancel
                                    </a>
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
