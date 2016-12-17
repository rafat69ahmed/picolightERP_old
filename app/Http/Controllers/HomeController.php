<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function userlogin()
    {
        // $view = property_exists($this, 'loginView')
        //             ? $this->loginView : 'auth.authenticate';

        // if (view()->exists($view)) {
        //     return view($view);
        // }
        // $users = User::find('username1'=kayes);
        $users = User::all();

        return view('auth.userlogin', compact('users'));

    }
}
