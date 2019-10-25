<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $fillable = ['date','employee_id','department_name','attendance_status'];

    public function validation()
    {
    	return [
    		'date' => 'date|required',
    		'employee_id' => 'required',
            'department_name' => 'required',
    		'attendance_status' => 'in:0,1|required'
    	];
    }
}
