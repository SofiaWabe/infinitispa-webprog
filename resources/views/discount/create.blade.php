@extends('discount.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new discount</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('discount.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <!-- Discount Name -->
                        <div class="form-group{{ $errors->has('discountname') ? ' has-error' : '' }}">
                            <label for="discountname" class="col-md-4 control-label">Discount Name</label>
                            <div class="col-md-6">
                                <input id="discountname" type="text" class="form-control" name="discountname" value="{{ old('discountname') }}" required autofocus>
                                @if ($errors->has('discountname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('discountname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- Discount Rate -->
                        <div class="form-group{{ $errors->has('discountrate') ? ' has-error' : '' }}">
                            <label for="discountrate" class="col-md-4 control-label">Discount Rate</label>
                            <div class="col-md-6">
                                <input id="discountrate" type="text" class="form-control" name="discountrate" value="{{ old('discountrate') }}" required autofocus placeholder="%">
                                @if ($errors->has('discountrate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('discountrate') }}</strong>
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
