<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
dfbjkldfgnk
</body>
</html> -->


@extends('layouts.app')

@section('content')

<div class="container">

  <form style="background-color:#e6faff" method="POST" action="{{ url('/clientadmin/receipt/update/'.$cadminreceipt->id) }}">
    {{ csrf_field() }}
       @if($cadminreceipt->id > 0)
        <div>{{$cadminreceipt->id}}</div>
       @endif

  <div class="panel text-center">
    <div class="panel-body"><h3>আলুপ্রাপ্তি রশিদ</h3></div>
  </div>

  <div class="row  form-group{{ $errors->has('booking_no') ? ' has-error' : '' }}">
    <div class="col-xs-12 col-sm-6 col-md-6 text-left"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
      <label>booking no:</label>
      <input type="text" class="form-control" name="booking_no" value="{{ old('booking_no') }} {{ $cadminreceipt->booking_no }}">
    </div>
    <div class="col-xs-6 col-md-6 text-right"><!-- .col-xs-6 .col-md-4 -->
      <label>mobile no:</label>
      <label>0187321321</label>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-3 text-center"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
      <h1>LOGO</h1>
    </div>
    <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
      <h2>শাহ্ ইসমাঈল গাজী (রহঃ) কোল্ড ষ্টােরেজ লিঃ</h2>
    </div>
  </div>
  <div class="row text-center">
    <h3>mohakhali dohs, dosh.</h3>
    <h3>baridhara dohs, dosh.</h3>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 text-left"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
      <label>AS. AR. no:</label>
      <input type="text" class="form-control" name="as_ar_no" value="{{ old('as_ar_no') }} {{ $cadminreceipt->as_ar_no }}" >
    </div>
    <div class="col-xs-6 col-md-6 "><!-- .col-xs-6 .col-md-4 -->
      <label>Date:</label>
      <input type="text" class="form-control" name="issue_date" value="{{ old('issue_date') }} {{ $cadminreceipt->issue_date }}">
    </div>
  </div>

  

  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-8 text-left"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
      <label>Agent Name:</label>
      <input type="text" class="form-control" name="agent_name" value="{{ old('agent_name') }} {{ $cadminreceipt->agent_name }}">
    </div>
    <!-- <div "col-xs-12 col-sm-6 col-md-4 text-left">
      <input type="text">
    </div> -->
    <div class="col-xs-12 col-sm-6 col-md-4"><!-- .col-xs-6 .col-md-4 -->
      <label class="text-right">Code no:</label>
      <input type="text" class="form-control" name="code_no" value="{{ old('code_no') }} {{ $cadminreceipt->code_no }}">
    </div>
  </div>
  
  <div class="row text-center">
    <h2>Address of customer</h2>
  </div>

  <div class="row">
    <div class="form-group">
      <label class="control-label col-sm-2 text-right" >Party Name:</label>
      <div class="col-sm-10 ">          
        <input type="text" class="form-control text-left" name="party_name" value="{{ old('party_name') }} {{ $cadminreceipt->party_name }}">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="form-group">
      <label class="control-label col-sm-2 text-right" >Fathers Name:</label>
      <div class="col-sm-10 ">          
        <input type="text" class="form-control text-left"  name="fathers_name" value="{{ old('fathers_name') }} {{ $cadminreceipt->fathers_name }}">
      </div>
    </div>
  </div>

  <div class="form-inline row text-right">
    <div class="form-group col-sm-5">
      <label for="focusedInput">Village</label>
      <input class="form-control"  type="text" name="village" value="{{ old('village') }} {{ $cadminreceipt->village }}">
    </div>
    <div class="form-group col-sm-3">
      <label for="focusedInput">Post Office</label>
      <input class="form-control" type="text" name="post_office" value="{{ old('post_office') }} {{ $cadminreceipt->post_office }}">
    </div>
    <div class="form-group col-sm-4">
      <label for="focusedInput">Mobile</label>
      <input class="form-control" type="text" name="mobile_no" value="{{ old('mobile_no') }} {{ $cadminreceipt->mobile_no }}">
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="row">
        <div class="form-group">
          <label class="control-label col-sm-2 text-right" >Number of bags:</label>
          <div class="col-sm-10 ">          
            <input type="text" class="form-control text-left" name="no_of_bags" value="{{ old('no_of_bags') }} {{ $cadminreceipt->no_of_bags }}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2 text-right" >potato info:</label>
          <div class="col-sm-10 ">          
            <input type="text" class="form-control text-left" name="potato_info" value="{{ old('potato_info') }} {{ $cadminreceipt->potato_info }}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2 text-right" >Due cost:</label>
          <div class="col-sm-10 ">          
            <input type="text" class="form-control text-left"  name="due_cost" value="{{ old('due_cost') }} {{ $cadminreceipt->due_cost }}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2 text-right" >transport cost:</label>
          <div class="col-sm-10 ">          
            <input type="text" class="form-control text-left" name="transport_cost" value="{{ old('transport_cost') }} {{ $cadminreceipt->transport_cost }}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2 text-right" >Empty bags:</label>
          <div class="col-sm-10 ">          
            <input type="text" class="form-control text-left" name="empty_bags" value="{{ old('empty_bags') }} {{ $cadminreceipt->empty_bags }}">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row text-center">
    <div class="col-xs-12 col-sm-6 col-md-3">সংরক্ষণকারী</div>
    <div class="col-xs-12 col-sm-6 col-md-3">স্টোরকিপার</div>
    <div class="col-xs-12 col-sm-6 col-md-3">প্রধান স্টোরকিপার</div>
    <div class="col-xs-12 col-sm-6 col-md-3">ব্যবস্থাপক</div>
  </div>

  

  <div class="row text-center">
      <h3>N.B. cannot cross the limit of 84 K.G</h3>    
  </div>

  <div class="row text-right">
      <div class="col-xs-12 col-sm-6 col-md-3 text-right">
        <input type="submit" class="btn btn-success  col-md-4 btn-block" value="submit">
      </div>
  </div>

  </form>

  

  <div class="panel panel-default">
    <div class="panel-footer">
      <div class="row ">
        <div class="col-xs-12 col-sm-6 col-md-6 text-left">Copyright &copy 2016</div>
        <div class="col-xs-12 col-sm-6 col-md-6 text-right">Powered by Picolight</div>
      </div>
    </div>
  </div>
<!-- <div class="row">
  <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
  <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
  Optional: clear the XS cols if their content doesn't match in height
  <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
</div> -->
</div>



@endsection