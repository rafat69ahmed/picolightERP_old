<?php

namespace App\Http\Controllers;


use App\Client;
use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
         public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         return view('client/list', [
            'clients' => Client::orderBy('created_at', 'asc')->get()
        ]);
    }

    public function create()
    {
        $client = new Client();
        $client->id = 0;
        return View('client\edit', compact('client') );
    }

    public function show($id)
    {
        $task = new Task();
        $task->c_id = 5;

        $client = Client::find($id);
        if (is_null($client))
        {
            return redirect('/admin/client');
        }
        return View('client\view', compact('client' , 'task')) ;
    }

    public function edit($id)
    {
        $client = Client::find($id);
        if (is_null($client))
        {
            return Redirect::route('/admin/client');
        }
        return View('client\edit', compact('client') 
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
        if($client->id == 0)
        {
            $updateClient = new Client();
        }
        else
        {
        $updateClient = Client::find($client->id);
        }
        $updateClient->name = $client->name;
        $updateClient->address = $client->address;
        $updateClient->save();
        return redirect('admin/client');
    }



    public function delete($id)
    {
        Client::findOrFail($id)->delete();
        return redirect('admin/client');
    }


//   /**
//      * Create a new controller instance.
//      *
//      * @return void
//      *
//     public function __construct()                       //for authentication of client
//     {
//         $this->middleware('auth');
//     }

//     public function index()
//     {
//          return view('client\list', [
//             'clients' => Client::orderBy('created_at', 'asc')->get()
//         ]);
//     }

//     public function create()
//     {
//         return view('client\create');
//     }

//     public function show($id)
//     {
//         $client = Client::find($id);
//         if (is_null($client))
//         {
//             return Redirect::route('/admin');
//         );
//             return View('client\show', compact('client') 
//         }
//     }
// */
}
