@extends('layouts.app')

@section('content')
<div class="container">

@if (count($cold_storage_receipts) == 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand"}}">
                    cold_storage_receipts
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/cold_storage_receipts/create') }}">Create</a></li>
                </ul>
            </div>
            </div>
        </div>
@endif


  @if (count($cold_storage_receipts) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand">
                    Receipt
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/cold_storage_receipts/create') }}">Create</a></li>
                </ul>
            </div>
            </div>
            <div class="panel-body">
                <table style="width:auto" class="table table-striped client-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Booking No</th>
                        <th>party_name</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($cold_storage_receipts as $receipt)
                            <tr>
                                <!-- receipt Name -->
                                <td class="table-text">
                                    <div>{{ $receipt->booking_receipt_no }}</div>
                                </td>
                                 <td class="table-text">
                                    <div>{{ $receipt->party_name }}</div>
                                </td>

                                 
                                <!-- TODO: Delete Button -->
                            <td align="right">
                                <form action="{{ url('/cold_storage_receipts/delete/'.$receipt->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <!-- TODO: Edit Button -->
                            <td>
                                <form action="{{ url('/cold_storage_receipts/edit/'.$receipt->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <!-- {{ method_field('EDIT') }} -->

                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>
                            </td>
                             <td>
                                <form action="{{ url('/cold_storage_receipts/view/'.$receipt->id) }}" method="GET">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </form>
                            </td>
                            </tr>
<!-- hello -->

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>
@endsection
