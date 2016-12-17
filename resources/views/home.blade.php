@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a>Dashboard</a></li>
                           
                    @if(Auth::user()->type =='master')

                     <li>
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Admin <span class="caret"></span>
                        </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/admin/user/create') }}">
                                <i class="fa fa-btn fa fa-user-plus"></i>Admin User Create
                                </a></li>
                                 <li><a href="{{ url('/admin/user') }}">
                                <i class="fa fa-btn fa fa-users"></i>Admin User List
                                </a></li>

                                <li><a>Client</a>
                                </li>
                                  <li><a href="{{ url('/admin/client/create') }}">
                                <i class="fa fa-btn fa fa-plus"></i>Create
                                </a></li>
                                 <li><a href="{{ url('/admin/client') }}">
                                <i class="fa fa-btn fa fa-list"></i>List
                                </a></li>
                            </ul>
                        </li>
                        @endif
                        
                         @if(Auth::user()->type =='client')
                            <li>
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Client <span class="caret"></span>
                        </a>

                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" >
                         
                                <li><a>User</a>
                                </li>
                                  <li><a href="{{ url('/user/create') }}">
                                <i class="fa fa-btn fa-user-plus"></i>User Create
                                </a></li>
                                 <li><a href="{{ url('/user') }}">
                                <i class="fa fa-btn fa fa-users"></i>User List
                                </a></li> 

                                <li><a>Company</a>
                                </li>
                                  <li><a href="{{ url('/client/company/create') }}">
                                <i class="fa fa-btn fa fa-briefcase"></i>Create
                                </a></li>
                                 <li><a href="{{ url('/client/company') }}">
                                <i class="fa fa-btn fa fa-list-alt"></i>List
                                </a></li>
                                    
                            </ul>
                        </li>
                        @endif
                        @if(Auth::user()->type =='user')
                        <li>
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Setup <span class="caret"></span>
                        </a>

                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" >
                                <li><a>Company Info</a>
                                </li>
                                  <li><a href="{{ url('/client/company/create') }}">
                                <i class="fa fa-btn fa fa-info"></i>Info
                                </a></li>
                                  
                                <li><a>Setup</a>
                                </li>
                                  <li><a href="{{ url('/agent/create') }}">
                                <i class="fa fa-btn fa-user-plus"></i>Agent Entry
                                </a></li>
                                <li>
                                    <a href="{{ url('/user') }}">
                                        <i class="fa fa-btn fa fa-users"></i>Agent List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/cold_storage_client/create') }}">
                                        <i class="fa fa-btn fa fa-users"></i>coldStorage client
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/cold_storage_client') }}">
                                        <i class="fa fa-btn fa fa-users"></i>coldStorage client List
                                    </a>
                                </li>
  
                            </ul>
                        </li>
                        <li>
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Cold Storage <span class="caret"></span>
                        </a>

                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" >
                         
                                <li><a>Receive</a>
                                </li>
                                  <li><a href="{{ url('/cold_storage_receipts/create') }}">
                                <i class="fa fa-btn fa-tag"></i>Potato Receive
                                </a></li>
                                <li>
                                    <a href="{{ url('/potato_storage_deed/create') }}">
                                        <i class="fa fa-btn fa-book"></i>Deed
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/potato_storage_deed/create') }}">
                                        <i class="fa fa-btn fa-book"></i>Deed create
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/cold_storage_receipts/create') }}">
                                        <i class="fa fa-btn fa-book"></i>Receipt create
                                    </a>
                                </li>
                               <!--  <li>
                                    <a href="{{ url('/user/create') }}">
                                        <i class="fa fa-btn fa-book"></i>Receipt list
                                    </a>
                                </li> -->
                                <li>
                                    <a href="{{ url('/cold_storage_receipts') }}">
                                        <i class="fa fa-btn fa-book"></i>Receipt list
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('loan') }}">
                                        <i class="fa fa-btn fa-book"></i>loan receive paper
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/loan/create') }}">
                                        <i class="fa fa-btn fa-book"></i>loan paper create
                                    </a>
                                </li>
                                 
                                <li><a>Districution</a>
                                
                                <li><a href="{{ url('/user') }}">
                                <i class="fa fa-btn fa fa-users"></i>Potato Districution
                                </a></li> 
                            </ul>
                        </li>
                        @endif
                         
                    </ul>

                   </div>
                </div>

                <div class="panel-body">

                    This is the dashboard!~!!

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
