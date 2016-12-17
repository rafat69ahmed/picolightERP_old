<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cadminreceipt;
use Illuminate\Support\Facades\Validator;
    

class CadminController extends Controller
{
    //

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('company\clientadminpanel\clientadmin');
    }
    public function list1()
    {
        return view('company\clientadminpanel\list', [
            'cadminreceipts' => Cadminreceipt::orderBy('created_at', 'asc')->get()
        ]);
    }

    
    public function create()
    {
        $cadminreceipt = new Cadminreceipt();
        $cadminreceipt->id = 0;
        return View('company\clientadminpanel\edit', compact('cadminreceipt') );
        
    }
    public function piku()
    {
        // $cadminreceipt = new Cadminreceipt();
        // $cadminreceipt->id = 0;
        return View('company\clientadminpanel\piku');
        
    }

    public function show($id)
    {
        $company = Company::find($id);
        if (is_null($company))
        {
            return redirect('/client/company');
        }
        return View('company\view', compact('company')) ;
         
        
    }

    public function edit($id)
    {
         $cadminreceipt = Cadminreceipt::find($id);
        if (is_null($cadminreceipt))
        {
            return Redirect::route('/clientadmin');
        }
        return View('company\clientadminpanel\edit', compact('cadminreceipt') 
        );
        
    }

    public function update(Request $cadminreceipt)//done
    {
        $validator = Validator::make($cadminreceipt->all(), [
            'booking_no' => 'required|max:255',
            // 'address' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/clientadmin/receipt/edit' .$cadminreceipt->id)
                ->withInput()
                ->withErrors($validator);
        }
        if($cadminreceipt->id == 0)
        {
            $updateCadminreceipt = new Cadminreceipt();
        }
        else
        {
            $updateCadminreceipt = Cadminreceipt::find($cadminreceipt->id);
        }
        $updateCadminreceipt->booking_no = $cadminreceipt->booking_no;
        $updateCadminreceipt->as_ar_no = $cadminreceipt->as_ar_no;
        $updateCadminreceipt->issue_date = $cadminreceipt->issue_date;
        $updateCadminreceipt->agent_name = $cadminreceipt->agent_name;
        $updateCadminreceipt->code_no = $cadminreceipt->code_no;

        $updateCadminreceipt->party_name = $cadminreceipt->party_name;
        $updateCadminreceipt->fathers_name = $cadminreceipt->fathers_name;
        $updateCadminreceipt->village = $cadminreceipt->village;
        $updateCadminreceipt->post_office = $cadminreceipt->post_office;
        $updateCadminreceipt->mobile_no = $cadminreceipt->mobile_no;

        $updateCadminreceipt->no_of_bags = $cadminreceipt->no_of_bags;
        $updateCadminreceipt->potato_info = $cadminreceipt->potato_info;
        $updateCadminreceipt->due_cost = $cadminreceipt->due_cost;
        $updateCadminreceipt->transport_cost = $cadminreceipt->transport_cost;
        $updateCadminreceipt->empty_bags = $cadminreceipt->empty_bags;
        
        $updateCadminreceipt->save();
        return redirect('/clientadmin');
    }

    public function delete($id)
    {
        Cadminreceipt::findOrFail($id)->delete();
        return redirect('/clientadmin/receipt/list');
    }


    public function receiptlist()
    {
        return view('company\clientadminpanel\list');
        
    }
    // public function cadmin()
    // {
    //     return view('company\clientadminpanel\cadmin');
   
    // }


public function multy()
    {
        return view('multipleinsert\insert');
        
    }


}
