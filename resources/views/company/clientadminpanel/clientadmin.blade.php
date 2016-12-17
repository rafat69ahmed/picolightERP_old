<!-- hasib  -->

<!-- <html>
<head>
	<title>admin panel</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
	<h1>hello world</h1>
	
</body>
</html> -->
@extends('layouts.app')

@section('content')

<div class="list-group">
  <a href="#" class="list-group-item disabled">
    SELECT ITEM
  </a>
  <a href="{{url('/clientadmin/receipt/create')}}" class="list-group-item">CREATE RECEIPT</a>
  <a href="{{url('/clientadmin/receipt/list')}}" class="list-group-item">RECEIPT LIST</a>
  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
  <a href="#" class="list-group-item">Vestibulum at eros</a>
</div>

@endsection