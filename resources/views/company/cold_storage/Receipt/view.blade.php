@extends('layouts.app')

@section('content')
<div class="container">
     <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

    <div><a href="{{ url('cold_storage_receipts') }}">receipt list</a>
                            <!-- <label class="col-md-4 control-label">Name</label> -->

    </div>

        <!-- New Task Form -->
                        <div class="form-group{{ $errors->has('sr_no') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">SR NO.</label>

                            <div class="col-md-6">
                                <label> {{ $cold_storage_receipt->sr_no }} </label>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('issue_date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">issue_date</label>

                            <div class="col-md-6">
                                <label> {{ $cold_storage_receipt->issue_date }} </label>
                            </div>
                        </div>
           

    </div>
</div>
@endsection
