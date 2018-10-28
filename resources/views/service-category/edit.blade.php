@extends('service-category.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update service category</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('service-category.update', ['id' => $category->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- Category Name -->
                        <div class="form-group{{ $errors->has('servicecategoryname') ? ' has-error' : '' }}">
                            <label for="servicecategoryname" class="col-md-4 control-label">Category Name</label>
                            <div class="col-md-6">
                                <input id="servicecategoryname" type="text" class="form-control" name="servicecategoryname" value="{{ $category->servicecategoryname }}" required autofocus>
                                @if ($errors->has('servicecategoryname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('servicecategoryname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- Description -->
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $category->description }}">
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
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
