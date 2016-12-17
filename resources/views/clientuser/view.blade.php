@extends('layouts.app')

@section('content')
<div class="container">
     <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

        <!-- New Task Form -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <label> {{ $user->name }} </label>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <label> {{ $user->email }} </label>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <label> {{ $user->type }} </label>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('username2') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <label> {{ $user->username1 }} </label>
                            </div>
                        </div>
           

    </div>

    

</div>
@endsection
