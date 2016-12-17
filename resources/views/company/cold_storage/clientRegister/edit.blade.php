@extends('layouts.app')

@section('content')
<div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand"}}">
                    Potato Recive
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/client/create') }}">New client</a></li>
                </ul>
            </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">client Register</div>
                <div class="panel-body">
                    <form action="{{ url('/client/update/'.$cold_storage_client_register->id) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                @if($cold_storage_client_register->id > 0)
                        <div>
                            <label class="col-md-4 control-label">ID</label>

                            <div class="col-md-6">
                            <label class="col-md-4 control-label">{{$cold_storage_client_register->id}}</label>
                            </div>
                        </div>
                @endif
                      
                        <div class="form-group{{ $errors->has('client_code') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">client Code</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="client_code" value="{{ old('client_code') }}{{ $cold_storage_client_register->client_code }}">

                                @if ($errors->has('client_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('client_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('client_name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">client Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="client_name" value="{{ old('client_name') }}{{ $cold_storage_client_register->client_name }}">

                                @if ($errors->has('client_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('client_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Mobile</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mobile_no" value="{{ old('mobile_no') }}{{ $cold_storage_client_register->mobile_no }}">

                                @if ($errors->has('mobile_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        <div class="form-group{{ $errors->has('national_id_no') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">National Id No</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="national_id_no" value="{{ old('national_id_no') }}{{ $cold_storage_client_register->national_id_no }}">

                                @if ($errors->has('national_id_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('national_id_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('client_address') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Address</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" name="client_address" value="{{ old('client_address') }}{{ $cold_storage_client_register->client_address }}">

                                @if ($errors->has('client_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('client_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">status</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" name="status" value="{{ old('status') }}{{ $cold_storage_client_register->status }}">

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
           
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-md-6 col-md-offset-10">
                    <button type="submit" class="btn btn-default">
                        @if ($cold_storage_client_register->id == 0)
                            <i class="fa fa-plus"></i> 
                            Save
                        @endif
                        @if ($cold_storage_client_register->id > 0)
                            <i class="fa fa-plus"></i> 
                            Update
                        @endif
                    </button>
                </div>
            </div>


        </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--  -->
@endsection
