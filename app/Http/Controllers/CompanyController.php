<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Validator;

class CompanyController extends Controller
{
    public function index(){

        $company = Company::paginate(10);
        return view('createcompany', compact('company'));
    }

    //create a new company
    public function store(Request $request){

        // $validator = Validator::make(
        //     ['companyname' =>  'required|min:3'],
        //     ['email' => 'required|email']
        // );
    
        $company = Company::create([
            'companyname' => $request->companyname,
            'email' => $request->email,
            'website' => $request->website
        ]);

        return redirect('createcompany');
    }

    //remove a selected company 
    public function destroy($id){
        Company::find($id)->delete();
        return redirect('createcompany');
    }

    //set daetails of company into the modal
    public function edit(Requset $request){

        $companies = Company::find($request->id);
        return $companies;

    }

    //updated the sepecifed company
    public function update(Request $request){

        $companyedit = Company::find($request->get('c_id'));
        $companyedit->companyname = $request->get('companyname');
        $companyedit->email = $request->get('email');
        $companyedit->website = $request->get('website');

        $companyedit->save();
        return redirect('createcompany');

    }
}
