@extends('service-duration.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update service duration</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('service-duration.update', ['id' => $duration->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- Duration Name -->
                        <div class="form-group{{ $errors->has('servicetypename') ? ' has-error' : '' }}">
                            <label for="servicetypename" class="col-md-4 control-label">Duration Name</label>
                            <div class="col-md-6">
                                <input id="servicetypename" type="text" class="form-control" name="servicetypename" value="{{ $duration->servicetypename }}" required autofocus>
                                @if ($errors->has('servicetypename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('servicetypename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- Service Category -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Service Category</label>
                            <div class="col-md-6">
                                <select class="form-control" name="servicecategory_id" required>
                                <option value="-1">Please select category</option>
                                    @foreach ($categorys as $category)
                                        <option {{$duration->servicecategory_id == $category->id ? 'selected' : ''}} value="{{$category->servicecategory_id}}">{{$category->servicecategoryname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <!-- Duration -->
                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">Duration</label>
                            <div class="col-md-6">
                                <input id="duration" type="text" class="form-control" name="duration" value="{{ $duration->duration }}" required>
                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
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
