<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class AdminClientUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $task = new Task();
        $task->c_id = 5;
        return view('adminclientuser\list', [
            'users' => User::orderBy('created_at', 'asc')->get()
        ] , compact('task') );
    }

    public function create()
    {
        $task = new Task();
        $user = new User();
        $user->id = 0;
        $task->c_id = 5;
        // $adminclientuser->c_id = 1;

        return View('adminclientuser\edit', compact('user','task') );
    }

    public function show()
    {
        return view('user/create');
    }

    public function edit($id)
    {
        $task = new Task();
        $task->c_id = 5;
        $user = User::find($id);
        if (is_null($user))
        {
            return Redirect::route('/admin/client/'.$task->c_id.'/user');
        }
        return View('adminclientuser\edit', compact('user','task') 
        );
        // return view('user/create');
    }

    public function update(Request $user)
    {
        $task = new Task();
        $task->c_id = 5;

        $validator = Validator::make($user->all(), [
            'name' => 'required|max:255',
            'username1' => 'required|max:255|unique:users',
            'type' => 'required|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/client/'.$task->c_id.'/user/create')
            // return redirect('/admin/client/'.$task->c_id.'/user/edit/'.$user->id)
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
        $updateAdminUser->password = bcrypt($user->password);
        $updateAdminUser->save();
        return redirect('/admin/client/'.$task->c_id.'/user');
 
    }

    public function delete($id)
    {
        $task = new Task();
        $task->c_id = 5;

        User::findOrFail($id)->delete();
        return redirect('/admin/client/'.$task->c_id.'/user');
    }

   
      /**
     * Create a new controller instance.
     *
     * @return void
     *
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
            return view('admin\createClient');
    }

    public function show($id)
    {
        $client = Client::find($id);
        if (is_null($client))
        {
            return Redirect::route('/admin');
        }
        return View('admin\showClient', compact('client') 
        );
    }

         public function edit($id)
    {
        $client = Client::find($id);
        if (is_null($client))
        {
            return Redirect::route('/admin');
        }
        return View('admin\editClient', compact('client') 
        );
    }

    public function update(Request $client)
    {
         $validator = Validator::make($client->all(), [
            'name' => 'required|max:255',
            'address' => 'required|max:255',

        ]);
        if ($validator->fails()) {
            return redirect('/admin/client/edit/' .$client->id)
                ->withInput()
                ->withErrors($validator);
        }
        $updateClient = Client::find($client->id);
        $updateClient->name = $client->name;
        $updateClient->address = $client->address;

        $updateClient->save();
        return redirect('/admin');
    }

        public function delete($id)
    {
        Client::findOrFail($id)->delete();

        return redirect('/admin');
    }
*/
}
