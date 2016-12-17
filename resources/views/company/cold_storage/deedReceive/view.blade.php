@extends('layouts.app')

@section('content')
<div class="container">
     <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

    <div><a href="{{ url('deedReceive') }}">deed receive list</a>
                            <!-- <label class="col-md-4 control-label">Name</label> -->

    </div>

        <!-- New Task Form -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <label> {{ $deedReceive->name }} </label>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Total rent</label>

                            <div class="col-md-6">
                                <label> {{ $deedReceive->total_rent }} </label>
                            </div>
                        </div>
           

    </div>
</div>
@endsection
