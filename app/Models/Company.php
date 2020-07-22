<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Venturecraft\Revisionable\RevisionableTrait;


class Company extends Model{
    
    use SoftDeletes;

    protected $table = 'company';

    protected $primaryKey = 'c_id';

    protected $fillable =['companyname','email','website'];
}

