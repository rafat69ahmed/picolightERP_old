<?php

namespace App\Http\Controllers;


use App\Company;
use App\User;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Auth;


class CompanyController extends Controller
{
         public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()//pending
    {
        return view('company/list', [
            'companies' =>  Company::where('client_id', Auth::user()->id)->get()
            // 'companies' =>  Company::orderBy('created_at', 'asc')->get()
        ]);
    }

    public function create()
    {
        $company = new Company();
        $company->id = 0;
        return View('company\edit', compact('company') );
        
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
         $company = Company::find($id);
        if (is_null($company))
        {
            return Redirect::route('/client/company');
        }
        return View('company\edit', compact('company') 
        );
        
    }

    public function update(Request $company)
    {
        $validator = Validator::make($company->all(), [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/client/company/edit/'.$company->id)
                ->withInput()
                ->withErrors($validator);
        }
        if($company->id == 0)
        {
            $updateCompany = new Company();
        }
        else
        {
            $updateCompany = Company::find($company->id);
        }
        $updateCompany->name = $company->name;
        $updateCompany->address = $company->address;
        $updateCompany->client_id = Auth::user()->id;
        $updateCompany->save();
        return redirect('client/company');
    }

    public function delete($id)
    {
         Company::findOrFail($id)->delete();
        return redirect('client/company');
    }


    
    


 
}
