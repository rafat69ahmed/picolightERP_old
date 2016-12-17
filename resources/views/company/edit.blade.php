<!-- _________________________________________________________
	____________________COMPANY CREATE________________________
	__________________________________________________________ -->


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Company create</div>
                <div class="panel-body">
                    <form action="{{ url('/client/company/update/'.$company->id) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                        @if($company->id > 0)
                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Id</label>

                            <div class="col-md-6">
                            <label class="col-md-0 control-label">{{$company->id}}</label>
                            </div>
                        </div>
                        @endif
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Company Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }} {{ $company->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Company Address</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" value="{{ old('address') }} {{ $company->address }}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
            <!-- Task Name -->
            <!-- <div class="form-group">
                <label for="client" class="col-sm-3 control-label">Client</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="client-name" class="form-control">
                </div>
                 <label for="client" class="col-sm-3 control-label">Address</label>

                <div class="col-sm-6">
                    <input type="text" name="address" id="client-address" class="form-control">
                </div>
            </div> -->

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Company create & Update
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
