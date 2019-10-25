<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;
use App\Attendance;
use Validator;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employee'] = Employee::join('attendance','employee.employee_id','=','attendance.employee_id')
            ->join('department','employee.department_name','=','department.id')
            ->join('designation','employee.designation_name','=','designation.id')
            ->select('employee.image','employee.employee_name','employee.employee_id','department.department_name as department','designation.designation_name as designation','attendance.date','attendance.id','attendance.attendance_status')
            ->get();
        return view('Admin.Attendance.attendance',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['department'] = Department::get();
        return view('Admin.Attendance.add_attendance',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $att_model = new Attendance;
        $validator = Validator::make($request->all(),$att_model->validation());
        if($validator->fails())
        {
            return back()
            ->withErrors($validator);
        }
        else
        {
            // For Today Date Validation
            $today = date('Y-m-d');
            if(!($request->date == $today))
            {
                return back()
                ->with('error','Your Selected Date Is Not Today');
            }
            else
            {
                // For no submit without no mark
                if(!($request->attendance_status))
                {
                    return back()
                    ->with('error','Please Mark Attendance');
                }
                else
                {
                    //For Daily Only One Time Department Wise Submission 
                    $data = Attendance::where('date',$request->date)->where('department_name',$request->department_name)->get();
                    //For Wrong 'employee_id' Input In Inspect Option
                    $emp_data = Employee::where('employee_id',$request->employee_id)->get();
                    //For Wrong 'department_name' Input In Inspect Option
                    $dept_data = Employee::where('department_name',$request->department_name)->get();
                            
                    if($data->toArray() || $emp_data->isEmpty() || $dept_data->isEmpty())
                    {
                        return back()
                        ->with('error','Already Todays Attendance Took For Following Department Or Your Input Is Wrong');
                    }
                    else
                    {
                        //Value Declare for blank checkbox
                        if(!($request->attendance_status))
                        {
                            $request->attendance_status=['0'];
                        }
                        $present = array_intersect($request->employee_id, $request->attendance_status);
                        $absent = array_diff($request->employee_id, $request->attendance_status);

                        //For Present Attendance
                        foreach($present as $key => $present_data)
                        {
                            $attendance_model = new Attendance;
                            $attendance_model->date = $request->date;
                            $attendance_model->employee_id = $present_data;
                            $attendance_model->department_name = $request->department_name;
                            $attendance_model->attendance_status = '1';

                            $attendance_model->save();
                        }
                        //For Absent Attendance
                        foreach($absent as $key => $absent_data)
                        {
                            $attendance_model = new Attendance;
                            $attendance_model->date = $request->date;
                            $attendance_model->employee_id = $absent_data;
                            $attendance_model->department_name = $request->department_name;
                            $attendance_model->attendance_status = '0';

                            $attendance_model->save();
                        }

                        return back()
                        ->with('success','Attendance Took Successfully');
                    }
                }
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
        $status = Attendance::find($id);
        if($status->attendance_status == 1)
        {
            $status->update([
                'attendance_status' => '0'
            ]);
        }
        else
        {
            $status->update([
                'attendance_status' => '1'
            ]);
        } 

        return back()
        ->with('success','Attendance Status Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['attendance'] = Attendance::join('employee','attendance.employee_id','=','employee.employee_id')
            ->join('department','attendance.department_name','=','department.id')
            ->join('designation','employee.designation_name','=','designation.id')
            ->select('employee.employee_name','employee.employee_id','department.department_name as department','designation.designation_name as designation','attendance.date','attendance.id as att_id','attendance.attendance_status')
            ->find($id);
            // echo "<pre>";
            // print_r($data);
        return view('Admin.Attendance.edit_attendance',$data);
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
        $validation = Validator::make($request->all(),[
            'attendance_status' => 'in:0,1|required',
        ]);
        
        if($validation->fails())
        {
            return back()
            ->withErrors($validation);
        }
        else
        {
            Attendance::find($id)
            ->update([
            'attendance_status' => $request->attendance_status
            ]);

            return redirect('/attendance')
            ->with('success','Attendance Updated Successfully');
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
