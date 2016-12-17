@extends('layouts.app')

@section('content')

<div class="container" method="POST" ">
    <form method="POST"  action="{{ url('/potato_storage_deed/update/'.$deedReceive->id) }}">
        {{ csrf_field() }}
        
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>deed_no</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="deed_no" value="{{ old('deed_no') }} {{ $deedReceive->deed_no }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>potato_receipt_id</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="potato_receipt_id" value="{{ old('potato_receipt_id') }} {{ $deedReceive->potato_receipt_id }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>booking_no</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="booking_no" value="{{ old('booking_no') }} {{ $deedReceive->booking_no }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>reserve_potato_bags</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="reserve_potato_bags" value="{{ old('reserve_potato_bags') }} {{ $deedReceive->reserve_potato_bags }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>rent_each_bag</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="rent_each_bag" value="{{ old('rent_each_bag') }} {{ $deedReceive->rent_each_bag }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>total_rent</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="total_rent" value="{{ old('total_rent') }} {{ $deedReceive->total_rent }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>empty_bags</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="empty_bags" value="{{ old('empty_bags') }} {{ $deedReceive->empty_bags }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>   empty_bags_price</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="    empty_bags_price" value="{{ old(' empty_bags_price') }} {{ $deedReceive->    empty_bags_price }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>   empty_bags_total_price_</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="empty_bags_total_price_" value="{{ old('empty_bags_total_price_') }} {{ $deedReceive->empty_bags_total_price_ }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>loan</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="loan" value="{{ old('loan') }} {{ $deedReceive->loan }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>transport_cost</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="transport_cost" value="{{ old('transport_cost') }} {{ $deedReceive->transport_cost }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>sub_total</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="sub_total" value="{{ old('sub_total') }} {{ $deedReceive->sub_total }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>potato_type</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="potato_type" value="{{ old('potato_type') }} {{ $deedReceive->potato_type }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>weight_each_potato_bag</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="weight_each_potato_bag" value="{{ old('weight_each_potato_bag') }} {{ $deedReceive->weight_each_potato_bag }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>note</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="note" value="{{ old('note') }} {{ $deedReceive->note }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label>name</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="name" value="{{ old('name') }} {{ $deedReceive->name }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  <label> user_id</label>
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="text" class="form-control" name="user_id" value="{{ old(' user_id') }} {{ $deedReceive->user_id }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 text-right"><!-- .col-xs-12 .col-sm-6 .col-md-8 -->
                  
                </div>
                <div class="col-xs-6 col-md-9 text-left"><!-- .col-xs-6 .col-md-4 -->
                  <input type="submit" class=" btn btn-primary" name="user_id" value="submit">
                </div>
            </div>
        
    </form>
</div>




@endsection