<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MobileController extends Controller
{
    //
    public function index()
    {
        return view('multipleinsert\insert');
        
    }
}
