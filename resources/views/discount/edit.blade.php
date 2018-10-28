@extends('discount.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update discount</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('discount.update', ['id' => $discount->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- Discount Name -->
                        <div class="form-group{{ $errors->has('discountname') ? ' has-error' : '' }}">
                            <label for="discountname" class="col-md-4 control-label">Discount Name</label>
                            <div class="col-md-6">
                                <input id="discountname" type="text" class="form-control" name="discountname" value="{{ $discount->discountname }}" required autofocus>
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
                                <input id="discountrate" type="text" class="form-control" name="discountrate" value="{{ $discount->discountrate }}">
                                @if ($errors->has('discountrate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('discountrate') }}</strong>
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
