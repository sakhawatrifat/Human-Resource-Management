<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = ['name','fathers_name','date_of_birth','gender','phone','present_address','premanent_address','email','password','image','employee_id','department','designation','date_of_joining','joining_salary','resume'];

    public function validation()
    {
    	return [
    		'name' => 'required',
    		'fathers_name' => 'required',
    		'date_of_birth' => 'required',
    		'gender' => 'required',
    		'phone' => 'numeric|required',
    		'present_address' => 'required',
    		'premanent_address' => 'required',
    		'email' => 'email|unique:employee|required',
    		'password' => 'required|confirmed|min:6',
    		'password_confirmation' => 'required',
    		'employee_id' => 'numeric|required',
    		'department' => 'required',
    		'designation' => 'required',
    		'date_of_joining' => 'required',
    		'joining_salary' => 'required',
    	];
    }
}
