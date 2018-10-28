@extends('therapist-position.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new therapist position</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('therapist-position.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <!-- Theraphist Position -->
                        <div class="form-group{{ $errors->has('therapistposition') ? ' has-error' : '' }}">
                            <label for="therapistposition" class="col-md-4 control-label">Therapist Position</label>
                            <div class="col-md-6">
                                <input id="theraphistposition" type="text" class="form-control" name="therapistposition" value="{{ old('therapistposition') }}" required autofocus>
                                @if ($errors->has('therapistposition'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('therapistposition') }}</strong>
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
