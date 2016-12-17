@extends('layouts.app')

@section('content')
<div class="container">
  @if (count($clients) > 0)
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

            <div class="panel-body">
                <table style="width:auto" class="table table-striped client-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>Address</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <!-- client Name -->
                                <td class="table-text">
                                    <div>{{ $client->name }}</div>
                                </td>
                                 <td class="table-text">
                                    <div>{{ $client->address }}</div>
                                </td>

                                 
                                <!-- TODO: Delete Button -->
                            <td align="right">
                                <form action="{{ url('/admin/client/delete/'.$client->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <!-- TODO: Edit Button -->
                            <td>
                                <form action="{{ url('/admin/client/edit/'.$client->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <!-- {{ method_field('EDIT') }} -->

                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>
                            </td>
                             <td>
                                <form action="{{ url('/admin/client/view/'.$client->id) }}" method="GET">
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
