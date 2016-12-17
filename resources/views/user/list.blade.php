@extends('layouts.app')

@section('content')
<div class="container">

@if (count($users) == 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" >
                    User List
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('admin/user/create') }}">Create</a></li>
                </ul>
            </div>
            </div>
        </div>
    @endif


  @if (count($users) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" >
                    User List
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('admin/user/create') }}">Create</a></li>
                </ul>
            </div>
            </div>

            <div class="panel-body">
                <table style="width:auto" class="table table-striped client-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User name</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <!-- client Name -->
                                <td class="table-text">
                                    <div>{{ $user->name }}</div>
                                </td>
                                 <td class="table-text">
                                    <div>{{ $user->email }}</div>
                                </td>
                                 <td class="table-text">
                                    <div>{{ $user->username1 }}</div>
                                </td>

                                 
                                <!-- TODO: Delete Button -->
                            <td align="right">
                                <form action="{{ url('/admin/user/delete/'.$user->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <!-- TODO: Edit Button -->
                            <td>
                                <form action="{{ url('/admin/user/edit/'.$user->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <!-- {{ method_field('EDIT') }} -->

                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>
                            </td>
                             <td>
                                <form action="{{ url('/admin/user/view/'.$user->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <!-- {{ method_field('EDIT') }} -->

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
