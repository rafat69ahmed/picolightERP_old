@extends('layouts.app')

@section('content')
<div class="container">
     <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

    <div><a href="{{ url('/loan/create') }}">Create loan receive paper</a>
                            <!-- <label class="col-md-4 control-label">Name</label> -->

    </div>

        <!-- New Task Form -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <label> {{ $cold_storage_loan_receive_paper->name }} </label>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('potato_store_date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">potato_store_date</label>

                            <div class="col-md-6">
                                <label> {{ $cold_storage_loan_receive_paper->potato_store_date }} </label>
                            </div>
                        </div>
           

    </div>
</div>
@endsection
