@extends('layouts.app')

@section('content')
<div class="container">

@if (count($cold_storage_deed_receives) == 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand"}}">
                    Clients
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- <li><a href="{{ url('/admin/client/create') }}">Create</a></li> -->
                </ul>
            </div>
            </div>
        </div>
@endif


  @if (count($cold_storage_deed_receives) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand">
                    Client
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- <li><a href="{{ url('/admin/client/create') }}">Create</a></li> -->
                </ul>
            </div>
            </div>
            <div class="panel-body">
                <table style="width:auto" class="table table-striped client-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>loan</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($cold_storage_deed_receives as $deedReceive)
                            <tr>
                                <!-- deedReceive Name -->
                                <td class="table-text">
                                    <div>{{ $deedReceive->name }}</div>
                                </td>
                                 <td class="table-text">
                                    <div>{{ $deedReceive->loan }}</div>
                                </td>

                                 
                                <!-- TODO: Delete Button -->
                            <td align="right">
                                <form action="{{ url('/potato_storage_deed/delete/'.$deedReceive->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <!-- TODO: Edit Button -->
                            <td>
                                <form action="{{ url('/potato_storage_deed/edit/'.$deedReceive->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <!-- {{ method_field('EDIT') }} -->

                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>
                            </td>
                             <td>
                                <form action="{{ url('/potato_storage_deed/view/'.$deedReceive->id) }}" method="GET">
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
