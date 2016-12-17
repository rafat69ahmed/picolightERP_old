@extends('layouts.app')

@section('content')
<div class="container">
     <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.errors')

        <!-- New Task Form -->
        <form action="{{ url('/admin/'.$client->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }} {{ $client->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" value="{{ old('address') }} {{ $client->address }}">

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
                        <i class="fa fa-plus"></i> Client Update
                    </button>
                </div>
            </div>


        </form>
    </div>

    

</div>
@endsection
