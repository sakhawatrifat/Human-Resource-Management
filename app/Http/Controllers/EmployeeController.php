<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Employee;
use App\Department;
use App\Designation;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employee'] = Employee::join('department','employee.department_name','=','department.id')
        ->join('designation','employee.designation_name','=','designation.id')
        ->select('employee.id as emp_id','employee.image','employee.employee_name','employee.employee_id','employee.phone','employee.date_of_joining','department.department_name as department','designation.designation_name as designation')
        ->get();
        return view('Admin.Employee.employee',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['department'] = Department::get();
        //$data['designation'] = Designation::get();
        return view('Admin.Employee.add_employee',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee;
        $validator = Validator::make($request->all(),$employee->validation());

        if($validator->fails())
        {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
            $department = Department::where('id',$request->department_name)
                        ->get();
            $designation = Designation::where('id',$request->designation_name)->where('department_id',$request->department_name)
                        ->get();
            if($department->isEmpty() || $designation->isEmpty())
            {
                return back()
                ->with('error','Wrong Input');
            }
            else
            {
                if($request->image)
                {
                    // Image Upload
                    $file = $request->file('image');
                    $destinationPath = 'image/';
                    $originalFile = time(). '.' .$file->getClientOriginalExtension();
                    $file->move($destinationPath, $originalFile);

                    // Password bcrypt
                    $data = $request->all();
                    $pass = $request->password;
                    $new_pass = bcrypt($pass);

                    // Array set all data
                    $new_data = Arr::set($data,'password',$new_pass);
                    $all_data = Arr::set($new_data,'image',$originalFile);

                    $employee->fill($all_data)->save();
                }
                else
                {
                    // Image Upload
                    $file = $request->file('resume');
                    $destinationPath = 'file/';
                    $originalFile = time(). '.' .$file->getClientOriginalExtension();
                    $file->move($destinationPath, $originalFile);

                    // Password bcrypt
                    $data = $request->all();
                    $pass = $request->password;
                    $new_pass = bcrypt($pass);

                    // Array set all data
                    $new_data = Arr::set($data,'password',$new_pass);
                    $all_data = Arr::set($new_data,'resume',$originalFile);

                    $employee->fill($all_data)->save();
                }  
                
                return back()
                ->with('success','Data Inserted Successfully');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['employee'] = Employee::join('department','employee.department_name','=','department.id')
        ->join('designation','employee.designation_name','=','designation.id')
        ->select('employee.id as emp_id','employee.image','employee.employee_name','employee.fathers_name','employee.date_of_birth','employee.present_address','employee.premanent_address','employee.employee_id','employee.phone','employee.date_of_joining','employee.joining_salary','employee.email','employee.password','employee.gender','department.id as department_id','department.department_name as department','designation.designation_name as designation','designation.id as designation_id')
        ->find($id);
        return view('Admin.Employee.edit_employee',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = new Employee;
        $validator = Validator::make($request->all(),$employee->validation());

        if($validator->fails())
        {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
            $department = Department::where('id',$request->department_name)
                        ->get();
            $designation = Designation::where('id',$request->designation_name)->where('department_id',$request->department_name)
                        ->get();
            if($department->isEmpty() || $designation->isEmpty())
            {
                return back()
                ->with('error','Wrong Input');
            }
            else
            {
                if($request->image)
                {
                    // Image Upload
                    $file = $request->file('image');
                    $destinationPath = 'image/';
                    $originalFile = time(). '.' .$file->getClientOriginalExtension();
                    $file->move($destinationPath, $originalFile);

                    // Password bcrypt
                    $data = $request->all();
                    $pass = $request->password;
                    $new_pass = bcrypt($pass);

                    // Array set all data
                    $new_data = Arr::set($data,'password',$new_pass);
                    $all_data = Arr::set($new_data,'image',$originalFile);

                    $employee->find($id)->fill($all_data)->save();
                }
                else
                {
                    // Image Upload
                    $file = $request->file('resume');
                    $destinationPath = 'file/';
                    $originalFile = time(). '.' .$file->getClientOriginalExtension();
                    $file->move($destinationPath, $originalFile);

                    // Password bcrypt
                    $data = $request->all();
                    $pass = $request->password;
                    $new_pass = bcrypt($pass);

                    // Array set all data
                    $new_data = Arr::set($data,'password',$new_pass);
                    $all_data = Arr::set($new_data,'resume',$originalFile);
                    
                    $employee->find($id)->fill($all_data)->save();
                }  
                
                return back()
                ->with('success','Data Inserted Successfully');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
