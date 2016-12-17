@extends('layouts.app')

@section('content')
<div class="container">
     <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

    <div><a href="{{ url('client') }}">list</a>
                            <!-- <label class="col-md-4 control-label">Name</label> -->

    </div>

        <!-- New  Form -->
                        <div class="form-group{{ $errors->has('client_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <label> {{ $cold_storage_client_register->client_name }} </label>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('client_address') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <label> {{ $cold_storage_client_register->client_address }} </label>
                            </div>
                        </div>
           

    </div>
</div>
@endsection
