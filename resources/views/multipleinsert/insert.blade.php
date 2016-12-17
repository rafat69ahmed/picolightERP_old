<!--__________________________________________________________
____________________________MULTIPLE INSERT___________________
______________________________________________________________-->

@extends('layouts.app')

@section('content')


<div class="container">
	<form>
		<div class="row form-group">
		  <div class="col-md-4">
		  	<label class="control-label text-right" >Invoice No:</label>
		  	<input type="text" class="form-control text-left" name="">
		  </div>
		</div>
		<div class="row form-group">
		  <div class="col-md-4">
		  	<label class="control-label text-right" >Name:</label>
		  	<input type="text" class="form-control text-left" name="">
		  </div>
		</div>

		<div class="row text-center form-group" style="background:#e6f9ff">
			<label>Others Information</label>
		</div>

		<div style="background:#d1e0e0">
			<div class="row form-group text-center">
			  <div class="col-md-2">ID</div>
			  <div class="col-md-2">Title</div>
			  <div class="col-md-2">Description</div>
			  <div class="col-md-2">Quantity</div>
			  <div class="col-md-2">Price</div>
			  <div class="col-md-2">S_total</div>
			</div>
			<div class="row form-group text-center">
				<div class="col-md-2">
					<input type="text" class=" form-control">
				</div>
				<div class="col-md-2">
					<input type="text" class=" form-control">
				</div>
				<div class="col-md-2">
					<input type="text" class=" form-control">
				</div>
				<div class="col-md-2">
					<input type="text" class=" form-control">
				</div>
				<div class="col-md-2">
					<input type="text" class=" form-control">
				</div>
				<div class="col-md-2">
					<input type="text" class=" form-control">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<input type="submit" name="" class="btn btn-primary" value="submit">
				</div>
				<div class="col-md-6 text-right">
					<input type="submit" name="" class="btn btn-default" value="add new">
				</div>
			</div>
	</form>
</div>




@endsection