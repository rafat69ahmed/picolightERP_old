




@extends('layouts.app')

@section('content')
<div class="container">

   <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand"">
                    Loan on potao
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/loan/create') }}">New Receit</a></li>
                </ul>
            </div>
            </div>
        </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Loan Receipt</div>
                <div class="panel-body">
                    <form action="{{ url('/loan/update/'.$loan->id) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                @if($loan->id > 0)
                        <div>
                            <label class="col-md-4 control-label">ID</label>

                            <div class="col-md-6">
                            <label class="col-md-4 control-label">{{$loan->id}}</label>
                            </div>
                        </div>
                @endif
                         <!-- <div class="form-group">
                            <label class="col-md-4 control-label">Logged in user ID</label>

                            <div class="col-md-6">
                                <label class="col-md-1 control-label"> {{ Auth::user()->id }} </label>
                            </div>
                        </div> -->

                        <div class="form-group{{ $errors->has('sl_no') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">serial no</label>

                            <div class="col-md-2">
                                <input type="text" class="form-control" name="sl_no" value="{{ old('sl_no') }} {{ $loan->sl_no }}">

                                @if ($errors->has('sl_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sl_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('booking_no') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Booking no</label>

                            <div class="col-md-2">
                                <input type="text" class="form-control" name="booking_no" value="{{ old('booking_no') }} {{ $loan->booking_no }}">

                                @if ($errors->has('booking_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('booking_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-md-5 control-label">Date</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="date" value="{{ old('date') }} {{ $loan->date }}">

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has(' potato_store_date') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">potato store date</label>

                            <div class="col-md-5">
                                <input type="text" class="form-control" name="potato_store_date" value="{{ old('   potato_store_date') }} {{ $loan-> potato_store_date }}">

                                @if ($errors->has(' potato_store_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first(' potato_store_date') }}</strong>
                                    </span>
                                @endif
                            </div>

                             <label class="col-md-2  control-label">Loan amount</label>

                            <div class="col-md-2">
                                <input type="text" class="form-control" name="loan_amount" value="{{ old('loan_amount') }} {{ $loan->loan_amount }}">

                                @if ($errors->has('loan_amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('loan_amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-7 control-label">Loan Information</label>
 
                        </div>

                        <div class="form-group{{ $errors->has('interest_rate') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Party Name</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" name="interest_rate" value="{{ old('interest_rate') }} {{ $loan->interest_rate }}">

                                @if ($errors->has('interest_rate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('interest_rate') }}</strong>
                                    </span>
                                @endif
                            </div>

                             <label class="col-md-2  control-label">Deed no</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" name="deed_no" value="{{ old('deed_no') }} {{ $loan->deed_no }}">

                                @if ($errors->has('deed_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deed_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has(' potato_receipt_id') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Potato receipt id</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="  potato_receipt_id"  value="{{ old('   potato_receipt_id') }} {{ $loan->  potato_receipt_id }}" >

                                @if ($errors->has(' potato_receipt_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first(' potato_receipt_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Name</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }} {{ $loan->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
 
                        </div>

                         <div class="form-group">
                            <table class="table">
                            <tbody>
                            <!-- <tr>
                               
                                    <td><label class="col-md-10 control-label">Number of Bags</label></td>
                                    <td>
                                     <div class="col-md-16">
                                        <input type="text" class="form-control" name="no_of_potato_bags" value="{{ old('no_of_potato_bags') }} {{ $loan->no_of_potato_bags }}">

                                        @if ($errors->has('no_of_potato_bags'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_of_potato_bags') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </td>
                                    <td><label class="col-md-16 control-label">Piece</label></td>

                            <tr> -->
                             <tr>
                               
                                    <td><label class="col-md-10 control-label">User id</label></td>
                                    <td>
                                     <div class="col-md-16">
                                        <input type="text" class="form-control" name="user_id" value="{{ old('user_id') }} {{ $loan->user_id }}">

                                        @if ($errors->has('user_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('user_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </td>
                                    <td><label class="col-md-16 control-label"></label></td>

                            <tr>
                             <!-- <tr>
                               
                                    <td><label class="col-md-10 control-label">Loan</label></td>
                                    <td>
                                     <div class="col-md-16">
                                        <input type="text" class="form-control" name="loan" value="{{ old('loan') }} {{ $loan->loan }}">

                                        @if ($errors->has('loan'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('loan') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </td>
                                    <td><label class="col-md-16 control-label">Taka</label></td>

                            <tr> -->
                             <!-- <tr>
                               
                                    <td><label class="col-md-10 control-label">Transport Cost</label></td>
                                    <td>
                                     <div class="col-md-16">
                                        <input type="text" class="form-control" name="transport_cost" value="{{ old('transport_cost') }} {{ $loan->transport_cost }}">

                                        @if ($errors->has('transport_cost'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('transport_cost') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </td>
                                    <td><label class="col-md-16 control-label">Taka</label></td>

                            <tr>
                            <tr>
                               
                                    <td><label class="col-md-10 control-label">Empty Bags</label></td>
                                    <td>
                                     <div class="col-md-16">
                                        <input type="text" class="form-control" name="empty_bags" value="{{ old('empty_bags') }} {{ $loan->empty_bags }}">

                                        @if ($errors->has('empty_bags'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('empty_bags') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </td>
                                    <td><label class="col-md-16 control-label">Piece</label></td>

                            <tr> -->

                            </tbody>

                            </table>
 
                        </div>
             

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Save
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

