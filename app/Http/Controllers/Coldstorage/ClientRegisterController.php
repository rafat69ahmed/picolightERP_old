<?php

namespace App\Http\Controllers\Coldstorage;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ColdStorage\Cold_storage_client_register;
use Illuminate\Support\Facades\Validator;
use Auth;

class ClientRegisterController extends Controller
{
    //
    public function index()
    {
        return view('company/cold_storage/clientRegister/list', [
            'cold_storage_client_registers' => Cold_storage_client_register::orderBy('created_at', 'asc')->get()
            // 'cold_storage_agent_registers' =>  Cold_storage_agent_register::where('agent_code', Auth::user()->id)->get()

        ]);
    }


    public function create()
    {
        $cold_storage_client_register = new Cold_storage_client_register();
        $cold_storage_client_register->id = 0;

        return View('company\cold_storage\clientRegister\edit', compact('cold_storage_client_register') );
    }




    public function edit($id)
    {
         $cold_storage_client_register = Cold_storage_client_register::find($id);
        if (is_null($cold_storage_client_register))
        {
            return Redirect::route('client');
        }
        return View('company\cold_storage\clientRegister\edit', compact('cold_storage_client_register') 
        );
        
    }





    public function update(Request $cold_storage_client_register)
    { 
        $validator = Validator::make($cold_storage_client_register->all(), [
            'client_code' => 'required|max:20|unique:cold_storage_client_registers',
            'client_name' => 'required|max:255',
            'mobile_no' => 'required|max:255', 

        ]);

        if ($validator->fails()) {
            return redirect('/client/create')
                ->withInput()
                ->withErrors($validator);
        }
        if($cold_storage_client_register->id == 0)
        {
            $update_cold_storage_client_register = new Cold_storage_client_register();
        }
        else
        {
            $update_cold_storage_client_register = Cold_storage_client_register::find($cold_storage_client_register->id);
        }

        if ($cold_storage_client_register->id !== 0) {
            $update_cold_storage_client_register->client_code = $cold_storage_client_register->client_code;
            $update_cold_storage_client_register->user_id = Auth::user()->id;
            $update_cold_storage_client_register->name = Auth::user()->parent_id;
         }
        $update_cold_storage_client_register->client_name = $cold_storage_client_register->client_name;
        $update_cold_storage_client_register->client_address = $cold_storage_client_register->client_address;
        $update_cold_storage_client_register->mobile_no = $cold_storage_client_register->mobile_no;
        $update_cold_storage_client_register->national_id_no = $cold_storage_client_register->national_id_no;
        $update_cold_storage_client_register->status = $cold_storage_client_register->status;
        
        $update_cold_storage_client_register->save();
        return redirect('/client ');
    }



    public function show($id)
    {
        $cold_storage_client_register = Cold_storage_client_register::find($id);
        if (is_null($cold_storage_client_register))
        {
            return redirect('client');
        }
        return View('company\cold_storage\clientRegister\view', compact('cold_storage_client_register')) ;    
    }


    public function delete($id)
    {
        Cold_storage_client_register::findOrFail($id)->delete();
        return redirect('client');
    }



}
