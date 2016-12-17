<?php

namespace App\Http\Controllers\Coldstorage;

use App\User;
use Auth;
use App\ColdStorage\Cold_storage_receipt;
use App\ColdStorage\Cold_storage_agent_register;
use DateTime;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



class ReceiptController extends Controller
{
    
    //  public function index()
    // {
    //     return view('multipleinsert\insert');
        
    // }

       public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()//pending
    {
        return view('company\cold_storage\Receipt\list', [
            // 'cold_storage_receipts' =>  Cold_storage_receipt::where('client_id', Auth::user()->id)->get()
            'cold_storage_receipts' =>  Cold_storage_receipt::orderBy('created_at', 'asc')->get()
        ]);
    }

    public function create()
    {
        $cold_storage_receipt = new Cold_storage_receipt();
        $cold_storage_receipt->id = 0;

        $today = Carbon::now();
        // $today->toDateString();
        $cold_storage_receipt->issue_date = $today->toDateString();
        $agents = Cold_storage_agent_register::all();
        

        return View('company\cold_storage\Receipt\edit', compact('cold_storage_receipt', 'agents') );
        
    }

    public function show($id)
    {
        $cold_storage_receipt = Cold_storage_receipt::find($id);
        if (is_null($cold_storage_receipt))
        {
            return redirect('cold_storage_receipts');
        }
        return View('company\cold_storage\Receipt\view', compact('cold_storage_receipt')) ;
         
        
    }

    public function edit($id)
    {
        //  $company = Company::find($id);
        // if (is_null($company))
        // {
        //     return Redirect::route('/client/company');
        // }
        // return View('company\edit', compact('company') 
        // );
        
    }

    public function update(Request $cold_storage_receipt)
    {
        $validator = Validator::make($cold_storage_receipt->all(), [
            'booking_receipt_no' => 'required|max:20|unique:cold_storage_receipts',

            'sr_no' => 'required|max:50|unique:cold_storage_receipts',
            // 'issue_date' => 'required',
            // 'agent_name' => 'required|max:255',
            'agent_code' => 'required',
            'party_name' => 'required|max:255',
            'party_fathers_name' => 'max:255',
            'party_mobile_no' => 'required|max:20',
            'no_of_potato_bags' => 'required|max:50',

        ]);
        if ($validator->fails()) {
            return redirect('/cold_storage_receipts/create')
                ->withInput()
                ->withErrors($validator);
        }
        if($cold_storage_receipt->id == 0)
        {
            $update_cold_storage_receipt = new Cold_storage_receipt();
        }
        else
        {
            $update_cold_storage_receipt = Cold_storage_receipt::find($cold_storage_receipt->id);
        }
        $update_cold_storage_receipt->booking_receipt_no = $cold_storage_receipt->booking_receipt_no;
        $update_cold_storage_receipt->sr_no = $cold_storage_receipt->sr_no;
        $update_cold_storage_receipt->issue_date = $cold_storage_receipt->issue_date;
        $update_cold_storage_receipt->agent_name = $cold_storage_receipt->agent_name;
        $update_cold_storage_receipt->agent_code = $cold_storage_receipt->agent_code;
        $update_cold_storage_receipt->party_name = $cold_storage_receipt->party_name;
        $update_cold_storage_receipt->party_fathers_name = $cold_storage_receipt->party_fathers_name;
        $update_cold_storage_receipt->party_address = $cold_storage_receipt->party_address;
        $update_cold_storage_receipt->party_mobile_no = $cold_storage_receipt->party_mobile_no;
        $update_cold_storage_receipt->no_of_potato_bags = $cold_storage_receipt->no_of_potato_bags;
        $update_cold_storage_receipt->potato_type = $cold_storage_receipt->potato_type;
        $update_cold_storage_receipt->loan = $cold_storage_receipt->loan;
        $update_cold_storage_receipt->transport_cost = $cold_storage_receipt->transport_cost;
        $update_cold_storage_receipt->empty_bags = $cold_storage_receipt->empty_bags;
        
        $update_cold_storage_receipt->agent_id = $cold_storage_receipt->agent_id;
        $update_cold_storage_receipt->user_id = Auth::user()->id;
        $update_cold_storage_receipt->name = Auth::user()->parent_id;
        $update_cold_storage_receipt->save();
        return redirect('/cold_storage_receipts/create');
    }

    public function delete($id)
    {
         Cold_storage_receipt::findOrFail($id)->delete();
        return redirect('cold_storage_receipts');
    }

    public function json()
    {
        $user = User::where('id' , '1')->get();

        return response()->json($user);
    }

     public function getAgentCode($agent_code)
    {
        $agentInfo = Cold_storage_agent_register::where('agent_code' , $agent_code)->get();
        return response()->json($agentInfo);
    }


 
}
