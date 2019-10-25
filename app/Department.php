<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    protected $fillable = ['department_name'];

    public function validation()
    {
    	return [
    		'department_name' => 'required|unique:department,department_name'
    	];
    }

    // public function updateValidation()
    // {
    // 	return [
    // 		'department_name' => "required|unique:department,department_name,$id"
    // 	];
    // }
}
