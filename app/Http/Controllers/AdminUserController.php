<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         return view('user\list', [
            'users' => User::orderBy('created_at', 'asc')->get()
        ]);
    }

    public function create()
    {   
        // $clients = User::where($parent_id ==2);
        $clients = User::where('parent_id' , 2)->get();

        $user = new User();
        $user->id = 0;
        return View('user\edit', compact('user','clients') );
         // return view('user/create');
    }

    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user))
        {
            return redirect('/admin/user');
        }
        return View('user\view', compact('user')) ;
         // return view('user/show');
    }

    public function edit($id)
    {
         // return view('user/edit');
        $user = User::find($id);
        if (is_null($user))
        {
            return Redirect::route('/admin/user');
        }
        return View('user\edit', compact('user')
        );

    }

    public function update(Request $user)
    {
        $validator = Validator::make($user->all(), [
            'name' => 'required|max:255',
            'username1' => 'required|max:255|unique:users',
            'type' => 'required|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/user/edit/'.$user->id)
                ->withInput()
                ->withErrors($validator);
        }
        if($user->id == 0)
        {
            $updateAdminUser = new User();
        }
        else
        {
            $updateAdminUser = User::find($user->id);
        }
 
        $updateAdminUser->name = $user->name;
        $updateAdminUser->username1 = $user->username1;
        $updateAdminUser->type = $user->type;
        $updateAdminUser->email = $user->email;
        if ($updateAdminUser->type == 'client') {
            $updateAdminUser->parent_id = 2;
        }
        if ($updateAdminUser->type == 'user') {
            // $updateAdminUser->parent_id = 3;
            $updateAdminUser->parent_id = $user->parent_id;
        }
        $updateAdminUser->password = bcrypt($user->password);
        $updateAdminUser->save();
        return redirect('admin/user');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect('admin/user');
         // return view('user/list');
    }

}
