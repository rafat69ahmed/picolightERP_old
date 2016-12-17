<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()//pending
    {
        return view('profiles/list', [
            'profiles' => Profile::orderBy('created_at', 'asc')->get()
        ]);
    }

    public function create()
    {
        $profile = new Profile();
        $profile->id = 0;

        $users = User::all();

    // $roles = Roles::all();
    // $selectedRole = User::first()->role_id;

    // return view('my_view', compact('roles', 'selectedRole');

        return View('profiles\edit', compact('profile', 'users') );
         // return view('user/create');
    }

    public function show($id)
    {
        // $user = User::find($id);
        // if (is_null($user))
        // {
        //     return redirect('/admin/user');
        // }
        // return View('user\view', compact('user')) ;
         // return view('user/show');
    }

    public function edit($id)
    {
         // return view('user/edit');
        // $user = User::find($id);
        // if (is_null($user))
        // {
        //     return Redirect::route('/admin/user');
        // }
        // return View('user\edit', compact('user')
        // );

    }

    public function update(Request $profile)
    {
        $validator = Validator::make($profile->all(), [
            'name' => 'required|max:255',
            'telephone' => 'required|max:50',
            'user_id' => 'required|max:50',

            // 'email' => 'required|email|max:255|unique:users',
            // 'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('/profile/edit/'.$profile->id)
                ->withInput()
                ->withErrors($validator);
        }
        if($profile->id == 0)
        {
            $updateProfile = new Profile();
        }
        else
        {
            $updateProfile = User::find($profile->id);
        }
 
        $updateProfile->name = $profile->name;
        $updateProfile->telephone = $profile->telephone;
        $updateProfile->user_id = $profile->user_id;
        $updateProfile->save();
        return redirect('/profile');
    }

    public function delete($id)
    {
        // User::findOrFail($id)->delete();
        // return redirect('admin/user');
        //  // return view('user/list');
    }

}
