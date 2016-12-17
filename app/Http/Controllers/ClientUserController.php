<?php

namespace App\Http\Controllers;

// use App\User;
// use App\Clientuser;
// use App\Http\Requests;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\ThrottlesLogins;
// use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


// use App\Company;
use App\User;
use App\Clientuser;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Auth;


class ClientUserController extends Controller
{
         public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Read client id from session
         return view('clientuser/list', [
            // 'clientusers' => User::orderBy('created_at', 'asc')->get()
            'clientusers' =>  User::where('parent_id', Auth::user()->id)->get()
        ]);
    }

    public function create()
    {
        $user = new User();
        $user->id = 0;
        return View('clientuser\edit', compact('user') );
    }

    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user))
        {
            return Redirect::route('/user');
        }
        return View('clientuser\view', compact('user')) ;
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (is_null($user))
        {
            return Redirect::route('/user/create');
        }
        return View('clientuser\edit', compact('user')
        );
       
    }

    public function update(Request $user)
    {
         $validator = Validator::make($user->all(), [
            'name' => 'required|max:255',
            'username1' => 'required|max:255|unique:users',
            // 'type' => 'required|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('/user/create')
                ->withInput()
                ->withErrors($validator);
        }
        if($user->id == 0)
        {
            $updateClientUser = new User();
        }
        else
        {
            $updateClientUser = User::find($user->id);
        }
 
        $updateClientUser->name = $user->name;
        $updateClientUser->username1 = $user->username1;
        
        if (Auth::user()->type == 'client') {
            $updateClientUser->type = 'user';
        }
        $updateClientUser->email = $user->email;
        $updateClientUser->parent_id = Auth::user()->id;
       
        $updateClientUser->password = bcrypt($user->password);
        $updateClientUser->save();
        return redirect('/user');
         
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/user');
    }
}
