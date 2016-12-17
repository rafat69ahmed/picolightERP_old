@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Client User create</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/user/update/{id}') }}">
                        {{ csrf_field() }}
                        @if($user->id > 0)
                        <div>
                            <label class="col-md-4 control-label">ID</label>

                            <div class="col-md-6">
                            <label class="col-md-4 control-label">{{$user->id}}</label>
                            </div>
                        </div>
                        @endif
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" name="name" value="{{ old('name') }} {{ $user->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @if (Auth::user()->type ==  'master' )
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}" >
                            <label class="col-md-4 control-label">Type</label>
                            <div class="col-md-6">
                            <!-- is selected change here if selected value is "client" -->
                                <select type="type" class="form-control" name="type" >

                                    <option >--Select--</option>
                                    <option selected="selected" id="">client</option>
                                    <option  >user</option>
                                </select>
                            </div>
                        </div>
                        <!-- this div is hidden -->
                        <div  class="form-group{{ $errors->has('type') ? ' has-error' : '' }}" id="mySelect">
                            <label class="col-md-4 control-label">Client Name</label>
                            <div class="col-md-6">
                                <select class="form-control m-bot15" name="parent_id" id="parent_id"  disabled="disabled">
                                   @if($clients->count() > 0)
                                    @foreach($clients as $client)
                                   <option value="{{$client->id}}">{{$client->name}}</option>
                                  @endForeach
                                  @else
                                   No Record Found
                                    @endif   
                            </select>
                            </div>
                        </div>
                    @endif
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }} {{ $user->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('username1') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username1" value="{{ old('username1') }} {{ $user->username1 }}">

                                @if ($errors->has('username2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" >

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Create
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
