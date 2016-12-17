<!-- ____________________________________________________________
	______________________COMPANY VIEW___________________________
	_______________________________________________________________ -->


@extends('layouts.app')

@section('content')
<div class="container">
     <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

        <!-- New Task Form -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <label> {{ $company->name }} </label>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <label> {{ $company->address }} </label>
                            </div>
                        </div>
           

    </div>

    

</div>
@endsection
