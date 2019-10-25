<?php

namespace App\Http\Controllers;
use Carbon;
use Illuminate\Http\Request;
use App\Holiday;
use App\Employee;
use App\Designation;

class AjaxController extends Controller
{
	//Designation list
	public function designation_list(Request $request)
	{
		$data['designation'] = Designation::where('department_id',$request->department_id)->get();
		return view('Admin.Employee.employee_designation_ajax',$data);
;	}
	// Monthly Holiday Data
    public function holiday_list(Request $request)
    {
    	$month=$request->allmonth;
    	$data['holiday']=Holiday::whereMonth('date', $month)->get();
    	
    	return  view('Admin/Holiday.monthly_holiday',$data);
	}

	//Employee For Attendance Data
	public function employee_ajax(Request $request)
	{
		$dept = $request->department_name;
		
		
		$data['employee'] = Employee::join('department','employee.department_name','=','department.id')
		->join('designation','employee.designation_name','=','designation.id')
		->where('employee.department_name',$dept)
		->select('employee.image','employee.employee_name','department.department_name as department','designation.designation_name as designation')
		->get();
		return view('Admin.Attendance.employee_ajax',$data);
	}
}
