@extends('layouts.app')

@section('content')
<div class="container">

@if (count($cold_storage_agent_registers) == 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand"}}">
                    cold_storage_agent_registers
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/admin/agent/create') }}">Create</a></li>
                </ul>
            </div>
            </div>
        </div>
@endif


  @if (count($cold_storage_agent_registers) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand">
                    agent
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/agent/create') }}">Create</a></li>
                </ul>
            </div>
            </div>
            <div class="panel-body">
                <table style="width:auto" class="table table-striped agent-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>AgentName</th>
                        <th>AgentAddress</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($cold_storage_agent_registers as $agent)
                            <tr>
                                <!-- agent Name -->
                                <td class="table-text">
                                    <div>{{ $agent->agent_name }}</div>
                                </td>
                                 <td class="table-text">
                                    <div>{{ $agent->agent_address }}</div>
                                </td>

                                 
                                <!-- TOdo Delete Button -->
                            <td align="right">
                                <form action="{{ url('/agent/delete/'.$agent->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <!-- TOdo: Edit Button -->
                            <td>
                                <form action="{{ url('/agent/edit/'.$agent->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <!-- {{ method_field('EDIT') }} -->

                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>
                            </td>
                             <td>
                                <form action="{{ url('/agent/view/'.$agent->id) }}" method="GET">
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
