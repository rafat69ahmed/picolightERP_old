<?php

namespace App\Http\Controllers\Coldstorage;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ColdStorage\Cold_storage_agent_register;
use Illuminate\Support\Facades\Validator;
use Auth;


class AgentRegisterController extends Controller
{
    



       public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('company/cold_storage/agentRegister/list', [
            'cold_storage_agent_registers' => Cold_storage_agent_register::orderBy('created_at', 'asc')->get()
            // 'cold_storage_agent_registers' =>  Cold_storage_agent_register::where('agent_code', Auth::user()->id)->get()

        ]);
    }

    public function create()
    {
        $cold_storage_agent_register = new Cold_storage_agent_register();
        $cold_storage_agent_register->id = 0;

        // $today = Carbon::now();
        // $today->toDateString();
        // $cold_storage_receipt->issue_date = $today->toDateString();


        return View('company\cold_storage\agentRegister\edit', compact('cold_storage_agent_register') );
    }

    public function show($id)
    {
        $cold_storage_agent_register = Cold_storage_agent_register::find($id);
        if (is_null($cold_storage_agent_register))
        {
            return redirect('agent');
        }
        return View('company\cold_storage\agentRegister\view', compact('cold_storage_agent_register')) ;
         
        
    }

    public function edit($id)
    {
         $cold_storage_agent_register = Cold_storage_agent_register::find($id);
        if (is_null($cold_storage_agent_register))
        {
            return Redirect::route('agent');
        }
        return View('company\cold_storage\agentRegister\edit', compact('cold_storage_agent_register') 
        );
        
    }

    public function update(Request $cold_storage_agent_register)
    { 
        $validator = Validator::make($cold_storage_agent_register->all(), [
            'agent_code' => 'required|max:20|unique:cold_storage_agent_registers',
            'agent_name' => 'required|max:255',
            'mobile_no' => 'required|max:255', 

        ]);

        if ($validator->fails()) {
            return redirect('/agent/create')
                ->withInput()
                ->withErrors($validator);
        }
        if($cold_storage_agent_register->id == 0)
        {
            $update_cold_storage_agent_register = new Cold_storage_agent_register();
        }
        else
        {
            $update_cold_storage_agent_register = Cold_storage_agent_register::find($cold_storage_agent_register->id);
        }

        if ($cold_storage_agent_register->id !== 0) {
            $update_cold_storage_agent_register->agent_code = $cold_storage_agent_register->agent_code;
            $update_cold_storage_agent_register->user_id = Auth::user()->id;
            $update_cold_storage_agent_register->name = Auth::user()->parent_id;
         }
        $update_cold_storage_agent_register->agent_name = $cold_storage_agent_register->agent_name;
        $update_cold_storage_agent_register->agent_address = $cold_storage_agent_register->agent_address;
        $update_cold_storage_agent_register->mobile_no = $cold_storage_agent_register->mobile_no;
        $update_cold_storage_agent_register->national_id_no = $cold_storage_agent_register->national_id_no;
        
        $update_cold_storage_agent_register->save();
        return redirect('/agent');
    }

    public function delete($id)
    {
        Cold_storage_agent_register::findOrFail($id)->delete();
        return redirect('agent');
    }






}
