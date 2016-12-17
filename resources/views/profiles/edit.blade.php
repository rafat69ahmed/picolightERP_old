@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile create</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/update/{id}') }}">
                        {{ csrf_field() }}
                        @if($profile->id > 0)
                        <div>
                            <label class="col-md-4 control-label">ID</label>

                            <div class="col-md-6">
                            <label class="col-md-4 control-label">{{$profile->id}}</label>
                            </div>
                        </div>
                        @endif
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" name="name" value="{{ old('name') }} {{ $profile->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Telephone</label>

                            <div class="col-md-6">
                                <input type="type" class="form-control" name="telephone" value="{{ old('telephone') }} {{ $profile->telephone }}">

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">User ID</label>

                            <!-- <div class="col-md-6">
                                <input type="user_id" class="form-control" name="user_id" value="{{ old('user_id') }} {{ $profile->user_id }}">

                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div> -->
                            <div class="col-md-6">
                            <select class="form-control m-bot15" name="user_id">
                               @if($users->count() > 0)
                                @foreach($users as $user)
                               <option value="{{$user->id}}">{{$user->name}}</option>
                              @endForeach
                              @else
                               No Record Found
                                @endif   
                            </select>
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
