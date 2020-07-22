<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Validator;

class SampleDatatable extends Controller
{
    public function index(){
        
        $employee = Employee::paginate(1);
        return view('sampledtb', compact('employee'));
        
    }
}
