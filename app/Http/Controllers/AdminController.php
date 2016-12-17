<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //TODO: We will create dashboard view here
    public function index()
    {
         return view('admin\dashboard', [
            'clients' => Client::orderBy('created_at', 'asc')->get()
        ]);
    }
}
