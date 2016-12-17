<?php

namespace App\Http\Controllers\Coldstorage;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\ColdStorage\Cold_storage_deed_receive;
use Auth;


class DeedReceiveController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()//pending
    {
        return view('company/cold_storage/deedReceive/list', [
            // 'cold_storage_deed_receives' =>  Cold_storage_deed_receive::where('deed_no', Auth::user()->id)->get()
            'cold_storage_deed_receives' =>  Cold_storage_deed_receive::orderBy('created_at', 'asc')->get()
        ]);
    }

    // public function index()
    // {
    //     return view('company/cold_storage/DeedReceive/edit');
    // }

    public function create()
    {
        $deedReceive = new Cold_storage_deed_receive();
        $deedReceive->id = 0;
        return View('company/cold_storage/DeedReceive/edit', compact('deedReceive') );
        
    }

    public function show($id)
    {
        $deedReceive = Cold_storage_deed_receive::find($id);
        if (is_null($deedReceive))
        {
            return redirect('potato_storage_deed');
        }
        return View('company\cold_storage\deedReceive\view', compact('deedReceive')) ;
         
        
    }

    public function edit($id)
    {
        $deedReceive = DeedReceive::find($id);
        if (is_null($deedReceive))
        {
            return Redirect::route('potato_storage_deed');
        }
        return View('company\cold_storage\deedReceive\edit', compact('deedReceive') 
        );
        
    }



    public function update(Request $deedReceive)//done
    {
        $validator = Validator::make($deedReceive->all(), [
            // 'booking_no' => 'required|max:255',
            // 'address' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/potato_storage_deed/create')
                ->withInput()
                ->withErrors($validator);
        }
        if($deedReceive->id == 0)
        {
            $updateDeedReceive = new Cold_storage_deed_receive();
        }
        else
        {
            $updateDeedReceive = Cold_storage_deed_receive::find($deedReceive->id);
        }
        $updateDeedReceive->deed_no = $deedReceive->deed_no;
        $updateDeedReceive->potato_receipt_id = $deedReceive->potato_receipt_id;
        $updateDeedReceive->booking_no = $deedReceive->booking_no;
        $updateDeedReceive->reserve_potato_bags = $deedReceive->reserve_potato_bags;
        $updateDeedReceive->rent_each_bag = $deedReceive->rent_each_bag;

        $updateDeedReceive->total_rent = $deedReceive->total_rent;
        $updateDeedReceive->empty_bags = $deedReceive->empty_bags;
        $updateDeedReceive->empty_bags_price = $deedReceive->empty_bags_price;
        $updateDeedReceive->empty_bags_total_price_ = $deedReceive->empty_bags_total_price_;
        $updateDeedReceive->loan = $deedReceive->loan;

        $updateDeedReceive->transport_cost = $deedReceive->transport_cost;
        $updateDeedReceive->sub_total = $deedReceive->sub_total;
        $updateDeedReceive->potato_type = $deedReceive->potato_type;
        $updateDeedReceive->weight_each_potato_bag = $deedReceive->weight_each_potato_bag;
        $updateDeedReceive->note = $deedReceive->note;
        $updateDeedReceive->name = $deedReceive->name;
        $updateDeedReceive->user_id =Auth::user()->id;
        
        $updateDeedReceive->save();
        return redirect('/potato_storage_deed');
    }

 

    public function delete($id)
    {
         Cold_storage_deed_receive::findOrFail($id)->delete();
        return redirect('potato_storage_deed');
    }





    
}
