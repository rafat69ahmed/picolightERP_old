<!-- company list -->
<!-- /*_______________________________________________________________________________________
____________________________________________COMPANY LIST_________________________________________
_________________________________________________________________________________________*/ -->
@extends('layouts.app')

@section('content')
<div class="container">


@if (count($companies) == 0)
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


  @if (count($companies) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
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
            <div class="panel-body">
                <table style="width:auto" class="table table-striped client-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Client ID</th>
                        <th>Client Name</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <!-- client Name -->
                                <td class="table-text">
                                    <div>{{ $company->name }}</div>
                                </td>
                                 <td class="table-text">
                                    <div>{{ $company->address }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $company->client_id }}</div>
                                </td>
                                 <td class="table-text">
                                    <div>{{ $company->getUserName()}}</div>
                                </td>

                                 
                                <!-- TODO: Delete Button -->
                            <td align="right">
                                <form action="{{ url('/client/company/delete/'.$company->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <!-- TODO: Edit Button -->
                            <td>
                                <form action="{{ url('/client/company/edit/'.$company->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <!-- {{ method_field('EDIT') }} -->

                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>
                            </td>
                             <td>
                                <form action="{{ url('/client/company/view/'.$company->id) }}" method="GET">
                                    <button type="submit" class="btn btn-info">
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
