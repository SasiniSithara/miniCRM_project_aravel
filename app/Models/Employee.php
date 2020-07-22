<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Venturecraft\Revisionable\RevisionableTrait;


class Employee extends Model{
    
    use SoftDeletes;

    protected $table = 'employee';

    protected $primaryKey = 'emp_id';

    protected $fillable =['firstname','lastname','email','phone','c_id'];


    public function getCompany(){
        $companyname = Company::find($this->c_id);
        if($companyname)
        return $companyname->companyname;
    }
}

