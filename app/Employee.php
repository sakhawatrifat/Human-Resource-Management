<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = ['employee_name','fathers_name','date_of_birth','gender','phone','present_address','premanent_address','email','password','image','employee_id','department_name','designation_name','date_of_joining','joining_salary','resume'];

    public function validation()
    {
    	return [
    		'employee_name' => 'required',
    		'fathers_name' => 'required',
    		'date_of_birth' => 'date|required',
    		'gender' => 'in:male,female|required',
    		'phone' => 'numeric|required',
    		'present_address' => 'required',
    		'premanent_address' => 'required',
    		'email' => 'email|unique:employee,email|required',
    		'password' => 'required|confirmed|min:6',
    		'password_confirmation' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg',
    		'employee_id' => 'unique:employee|numeric|required',
    		'department_name' => 'required',
    		'designation_name' => 'required',
    		'date_of_joining' => 'date|required',
    		'joining_salary' => 'required',
            'resume.*' => 'mimes:pdf,docx'
    	];
    }
}
