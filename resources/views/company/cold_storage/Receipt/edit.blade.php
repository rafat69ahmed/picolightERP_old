@extends('layouts.app')

@section('content')

<p id="demo"></p>


<div class="container">

   <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand"}}">
                    Potato Recive
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/cold_storage_receipts/create') }}">New Receit</a></li>
                </ul>
            </div>
            </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Potato receive Receipt</div>
                <div class="panel-body">
                    <form action="{{ url('/cold_storage_receipts/update/'.$cold_storage_receipt->id) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                @if($cold_storage_receipt->id > 0)
                        <div>
                            <label class="col-md-4 control-label">ID</label>

                            <div class="col-md-6">
                            <label class="col-md-4 control-label">{{$cold_storage_receipt->id}}</label>
                            </div>
                        </div>
                @endif
                         <!-- <div class="form-group">
                            <label class="col-md-4 control-label">Logged in user ID</label>

                            <div class="col-md-6">
                                <label class="col-md-1 control-label"> {{ Auth::user()->id }} </label>
                            </div>
                        </div> -->

                        <div class="form-group{{ $errors->has('booking_receipt_no') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Booking no</label>

                            <div class="col-md-2">
                                <input type="text" class="form-control" name="booking_receipt_no" value="{{ old('booking_receipt_no') }}{{ $cold_storage_receipt->booking_receipt_no }}">

                                @if ($errors->has('booking_receipt_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('booking_receipt_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sr_no') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">S.R No</label>

                            <div class="col-md-2">
                                <input type="text" class="form-control" name="sr_no" value="{{ old('sr_no') }}{{ $cold_storage_receipt->sr_no }}">

                                @if ($errors->has('sr_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sr_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-md-5 control-label">Date</label>

                            <div class="col-md-3">
                                <input readonly="true" type="text" class="form-control" name="issue_date" value="{{ old('issue_date') }}{{ $cold_storage_receipt->issue_date }}">

                                @if ($errors->has('issue_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('issue_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('agent_name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Agent Name</label>

                            <div class="col-md-5">
                                <input id="agent_name" type="text" class="form-control" name="agent_name" value="{{ old('agent_name') }} {{ $cold_storage_receipt->agent_name }}">

                                @if ($errors->has('agent_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agent_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                             <label class="col-md-2  control-label">Agent Code</label>

                            <div class="col-md-2">
                                <input id="agent_code"  type="text" class="form-control" name="agent_code" value="{{ old('agent_code') }}{{ $cold_storage_receipt->agent_code }}" id="agent_code" ">

                                @if ($errors->has('agent_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agent_code') }}</strong>
                                    </span>
                                @endif
                       
                            </div>
                             <div id="agent_id_div" class="col-md-2">
                                <input id="agent_id"  type="text" class="form-control" name="agent_id" value="{{ old('agent_id') }}{{ $cold_storage_receipt->agent_id }}" id="agent_id" ">

                                @if ($errors->has('agent_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agent_id') }}</strong>
                                    </span>
                                @endif
                       
                            </div>
                            <div> 
                            <button type="button" class="btn btn-wraning" id="getRequist">GET</button>
                            </div>
                       
                        <div class="form-group">
                            <label class="col-md-7 control-label">Party Information</label>
                        </div>

                        <div class="form-group{{ $errors->has('party_name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Party Name</label>

                            <div class="col-md-4">
                                <input id="txtresult" type="text" class="form-control" name="party_name" value="{{ old('party_name') }} {{ $cold_storage_receipt->party_name }}">

                                @if ($errors->has('party_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('party_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                             <label class="col-md-2  control-label">Father's Name</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" name="party_fathers_name" value="{{ old('party_fathers_name') }} {{ $cold_storage_receipt->party_fathers_name }}">

                                @if ($errors->has('party_fathers_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('party_fathers_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('party_address') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Address</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="party_address"  value="{{ old('party_address') }} {{ $cold_storage_receipt->party_address }}" >

                                @if ($errors->has('party_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('party_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('party_mobile_no') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Mobile No</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" name="party_mobile_no" value="{{ old('party_mobile_no') }} {{ $cold_storage_receipt->party_mobile_no }}">

                                @if ($errors->has('party_mobile_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('party_mobile_no') }}</strong>
                                    </span>
                                @endif
                            </div>
 
                        </div>

                         <div class="form-group">
                            <table class="table">
                            <tbody>
                            <tr>
                               
                                    <td><label class="col-md-10 control-label">Number of Bags</label></td>
                                    <td>
                                     <div class="col-md-16">
                                        <input type="text" class="form-control" name="no_of_potato_bags" value="{{ old('no_of_potato_bags') }} {{ $cold_storage_receipt->no_of_potato_bags }}">

                                        @if ($errors->has('no_of_potato_bags'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_of_potato_bags') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </td>
                                    <td><label class="col-md-16 control-label">Piece</label></td>

                            <tr>
                             <tr>
                               
                                    <td><label class="col-md-10 control-label">Potato Discription</label></td>
                                    <td>
                                     <div class="col-md-16">
                                        <input type="text" class="form-control" name="potato_type" value="{{ old('potato_type') }} {{ $cold_storage_receipt->potato_type }}">

                                        @if ($errors->has('potato_type'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('potato_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </td>
                                    <td><label class="col-md-16 control-label"></label></td>

                            <tr>
                             <tr>
                               
                                    <td><label class="col-md-10 control-label">Loan</label></td>
                                    <td>
                                     <div class="col-md-16">
                                        <input type="text" class="form-control" name="loan" value="{{ old('loan') }} {{ $cold_storage_receipt->loan }}">

                                        @if ($errors->has('loan'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('loan') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </td>
                                    <td><label class="col-md-16 control-label">Taka</label></td>

                            <tr>
                             <tr>
                               
                                    <td><label class="col-md-10 control-label">Transport Cost</label></td>
                                    <td>
                                     <div class="col-md-16">
                                        <input type="text" class="form-control" name="transport_cost" value="{{ old('transport_cost') }} {{ $cold_storage_receipt->transport_cost }}">

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
                                        <input type="text" class="form-control" name="empty_bags" value="{{ old('empty_bags') }} {{ $cold_storage_receipt->empty_bags }}">

                                        @if ($errors->has('empty_bags'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('empty_bags') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </td>
                                    <td><label class="col-md-16 control-label">Piece</label></td>

                            <tr>

                            </tbody>

                            </table>
 
                        </div>
             

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-md-6 col-md-offset-10">
                    <button type="submit" class="btn btn-default">
                        @if ($cold_storage_receipt->id == 0)
                            <i class="fa fa-plus"></i> 
                            Save
                        @endif
                        @if ($cold_storage_receipt->id > 0)
                            <i class="fa fa-plus"></i> 
                            Update
                        @endif
                    </button>
                </div>
            </div>


        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<script type="text/javascript" >
//hiden Div
document.getElementById("agent_id_div").style.display= "none";

$(document).ready(function(){
    
    $("#agent_code").keyup(function(){
        var myLength = $("#agent_code").val().length;
        if (myLength>=4) {
            $("#agent_name").val("");
            var agentcode = $('#agent_code').val();
           $.get("/picolighterp/public" + '/' + "json"+ '/' + agentcode, function (data) {

                //success data
                console.log(data);
                //txtresult textbox id
                $("#agent_name").val(data[0].agent_name);
                $("#agent_id").val(data[0].id);
            })
        }
        else{
            $("#agent_name").val("");
        }

    });
});

$(document).ready(function(){
    //Button id getRequist
    $('#getRequist').click(function(){
 
        var myLength = $("#agent_code").val().length;
        if (myLength>=4) {
           $.get("/picolighterp/public" + '/' + "json", function (data) {

                //success data
                console.log(data);
                //txtresult textbox id
                $("#txtresult").val(data[0].name);
                
            })
        }
        else{
            alert("Agent code minimum 4 Digit");
        }
     
    });
});
</script>
@endsection