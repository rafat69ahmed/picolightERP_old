<?php

namespace App\Http\Controllers\Coldstorage;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ColdStorage\Cold_storage_loan_receive_paper;
use Auth;
use Illuminate\Support\Facades\Validator;


class LoanReceivePaperController extends Controller
{
    //



       public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('company/cold_storage/loan/list', [
            'Cold_storage_loan_receive_papers' => Cold_storage_loan_receive_paper::orderBy('created_at', 'asc')->get()
            // 'cold_storage_agent_registers' =>  Cold_storage_agent_register::where('agent_code', Auth::user()->id)->get()

        ]);
    }

    public function create()
    {
        $loan = new Cold_storage_loan_receive_paper();
        $loan->id = 0;
        return View('company/cold_storage/loan/edit', compact('loan') );
        
    }

    public function show($id)
    {
        $cold_storage_loan_receive_paper = Cold_storage_loan_receive_paper::find($id);
        if (is_null($cold_storage_loan_receive_paper))
        {
            return redirect('/client/company');
        }
        return View('company/cold_storage/loan/view', compact('cold_storage_loan_receive_paper')) ;

    }

    // public function edit($id)
    // {
    //      $company = Company::find($id);
    //     if (is_null($company))
    //     {
    //         return Redirect::route('/client/company');
    //     }
    //     return View('company\edit', compact('company') 
    //     );
        
    // }

    public function update(Request $cold_storage_loan_receive_paper)
    {
        $validator = Validator::make($cold_storage_loan_receive_paper->all(), [
            'sl_no' => 'required|max:255',
            'booking_no' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/loan/create')
                ->withInput()
                ->withErrors($validator);
        }
        if($cold_storage_loan_receive_paper->id == 0)
        {
            $updateLoan = new Cold_storage_loan_receive_paper();
        }
        else
        {
            $updateLoan = Cold_storage_loan_receive_paper::find($cold_storage_loan_receive_paper->id);
        }
        $updateLoan->sl_no = $cold_storage_loan_receive_paper->sl_no;
        $updateLoan->booking_no = $cold_storage_loan_receive_paper->booking_no;
        $updateLoan->date = $cold_storage_loan_receive_paper->date;
        $updateLoan->potato_store_date = $cold_storage_loan_receive_paper->potato_store_date;
        $updateLoan->loan_amount = $cold_storage_loan_receive_paper->loan_amount;
        $updateLoan->interest_rate = $cold_storage_loan_receive_paper->interest_rate;
        $updateLoan->deed_no = $cold_storage_loan_receive_paper->deed_no;
        $updateLoan->potato_receipt_id = $cold_storage_loan_receive_paper->potato_receipt_id;
        $updateLoan->name = $cold_storage_loan_receive_paper->name;
        //$updateLoan->potato_receipt_id = $cold_storage_loan_receive_paper->potato_receipt_id;
        $updateLoan->user_id = Auth::user()->id;
        $updateLoan->save();
        return redirect('loan');
    }

    public function delete($id)
    {
         Cold_storage_loan_receive_paper::findOrFail($id)->delete();
        return redirect('loan');
    }





    
}
