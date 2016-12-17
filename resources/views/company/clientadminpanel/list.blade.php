<!-- company list -->
<!-- /*_______________________________________________________________________________________
______________________________________RECEIPT EDIT UPDATE DELETE_________________________
_________________________________________________________________________________________*/ -->
@extends('layouts.app')

@section('content')
<div class="container">


@if (count($cadminreceipts) == 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand"}}>
                    Companies
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/client/company/create') }}">Create</a></li>
                </ul>
            </div>
            </div>
        </div>
@endif


  @if (count($cadminreceipts) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Picolight
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>
            </div>
            </div>
            <div><a href="{{ url('/clientadmin') }}">RECEIPT</a></div>
            <div class="panel-body">
                <table style="width:auto" class="table table-striped client-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>ID</th>
                        <th>AGENT NAME</th>
                        <th>PARTY NAME</th>
                        <th>VILLAGE</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($cadminreceipts as $cadminreceipt)
                            <tr>
                                <!-- client Name -->
                                <td class="table-text">
                                    <div>{{ $cadminreceipt->id }}</div>
                                </td>
                                 <td class="table-text">
                                    <div>{{ $cadminreceipt->agent_name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $cadminreceipt->party_name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $cadminreceipt->village }}</div>
                                </td>

                                 
                                <!-- TODO: Delete Button -->
                            <td align="right">
                                <form action="{{ url('/clientadmin/receipt/delete/'.$cadminreceipt->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <!-- TODO: Edit Button -->
                            <td>
                                <form action="{{ url('/clientadmin/receipt/edit/'.$cadminreceipt->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <!-- {{ method_field('EDIT') }} -->

                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>
                            </td>
                             <td>
                                <form action="{{ url('/client/company/view/'.$cadminreceipt->id) }}" method="GET">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </form>
                            </td>
                            </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>
@endsection
