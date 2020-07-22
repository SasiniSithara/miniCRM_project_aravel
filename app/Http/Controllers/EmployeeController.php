<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Validator;

class EmployeeController extends Controller
{
    public function index(){
        
        $company = Company::get();
       
        $employee = Employee::paginate(10);
        return view('createemployee', compact('company','employee'));
        
    }

     //create a new employee
    public function store(Request $request){

        // $validator = Validator::make(
        //     ['companyname' =>  'required|min:3'],
        //     ['email' => 'required|email']
        // );
    
        $employee = Employee::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'c_id' => $request->c_id
        ]);

        return redirect('createemployee');
    }

    //remove a selected employee 
    public function destroy($id){
        Employee::find($id)->delete();
        return redirect('createemployee');
    }

    //set daetails of employee into the modal
    public function edit(Requset $request){

        $employee = Employee::find($request->id);
        return $employee;

    }

    //updated the sepecifed employee
    public function update(Request $request){

        $employeeedit = Employee::find($request->get('emp_id'));
        $employeeedit->firstname = $request->get('firstname');
        $employeeedit->lastname = $request->get('lastname');
        $employeeedit->email = $request->get('email');
        $employeeedit->phone = $request->get('phone');
        $employeeedit->c_id = $request->get('c_id');

        $employeeedit->save();
        return redirect('createemployee');

    }
}
