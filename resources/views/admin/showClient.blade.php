@extends('layouts.app')

@section('content')
<div class="container">
     <!-- Bootstrap Boilerplate... -->
                     
    <div  class="panel-body">
        @include('errors.errors')

        <form action="{{ url('/admin/'.$client->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-12 control-label">ClientName:{{ $client->name }}</label>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="col-md-12 control-label">Address:{{ $client->address }}</label>
                        </div>


        </form>
    </div>

    

</div>
@endsection
