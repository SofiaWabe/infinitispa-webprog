@extends('service-duration.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new service duration</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('service-duration.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <!-- Duration Name -->
                        <div class="form-group{{ $errors->has('servicetypename') ? ' has-error' : '' }}">
                            <label for="servicetypename" class="col-md-4 control-label">Duration Name</label>
                            <div class="col-md-6">
                                <input id="servicetypename" type="text" class="form-control" name="servicetypename" value="{{ old('servicetypename') }}" required autofocus>
                                @if ($errors->has('servicetypename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('servicetypename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Service Category -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Category Name </label>
                            <div class="col-md-6">
                                <select class="form-control js-servicecategory" name="servicecategory_id" required>
                                    <option value="-1">Select a category</option>
                                    @foreach ($categorys as $category)
                                        <option value="{{$category->id}}">{{$category->servicecategoryname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                     <!-- Duration -->
                     <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">Duration</label>
                            <div class="col-md-6">
                                <input type="text" id="duration" class="form-control" name="duration" value="{{ old('duration') }}">
                                @if ($errors->has('duration'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
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
