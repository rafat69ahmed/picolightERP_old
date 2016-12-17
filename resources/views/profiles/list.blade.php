@extends('layouts.app')

@section('content')
<div class="container">

@if (count($profiles) == 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" >
                    Profile List
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('profile/create') }}">Create</a></li>
                </ul>
            </div>
            </div>
        </div>
    @endif


  @if (count($profiles) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" >
                    Profile List
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/profile/create') }}">Create</a></li>
                </ul>
            </div>
            </div>

            <div class="panel-body">
                <table style="width:auto" class="table table-striped client-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>Telephone</th>
                        <th>User name</th>
                        <th>User Id</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($profiles as $profile)
                            <tr>
                                <!-- client Name -->
                                <td class="table-text">
                                    <div>{{ $profile->name }}</div>
                                </td>
                                 <td class="table-text">
                                    <div>{{ $profile->telephone }}</div>
                                </td>
                                 <td class="table-text">
                                    <!-- <div>{{ $profile->getUserName()}}</div> -->
                                    <div>{{ $profile->user->name}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $profile->user_id }}</div>
                                </td>

                                 
                                <!-- TODO: Delete Button -->
                            <td align="right">
                                <form action="{{ url('/profile/delete/'.$profile->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <!-- TODO: Edit Button -->
                            <td>
                                <form action="{{ url('/profile/edit/'.$profile->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <!-- {{ method_field('EDIT') }} -->

                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>
                            </td>
                             <td>
                                <form action="{{ url('/profile/view/'.$profile->id) }}" method="GET">
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
