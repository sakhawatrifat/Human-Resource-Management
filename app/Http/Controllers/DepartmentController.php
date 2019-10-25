<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Designation;
use Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['department'] = Department::get();
        return view('Admin.Department.department',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department_model = new Department;
        $validator = Validator::make($request->all(),$department_model->validation());

        if($validator->fails())
        {
            return back()
            ->withErrors($validator);
        }
        else
        {
            $department_id = Department::create($request->all())->id;
            foreach($request->designation_name as $key => $value)
            {
                $designation_model = new Designation;
                $designation_model->designation_name = $value;
                $designation_model->department_id = $department_id;

                $designation_model->save();
            }
            return back()
            ->with('success','Data Inserted Successfully');
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
        $data['department'] = Department::find($id);
        return view('Admin.Department.edit_department',$data);
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
        $department_model = new Department;
        $validator = Validator::make($request->all(),[
            'department_name' => "required"
        ]);
        if($validator->fails())
        {
            return back()
            ->withErrors($validator);
        }
        else
        {
           $dept_id = $department_model->find($id);
           $department_model->find($id)->fill($request->all())->save();     
           foreach($request->designation_name as $key => $value)
           {
                $designation_model = new Designation;
                $designation_model->designation_name = $value;
                $designation_model->department_id = $dept_id->id;

                $desig_data = Designation::where('department_id',$id)->select('department_id')->get();
                //$designation_id = $desig_data->department_id;
                // echo "<pre>";
                // print_r($desig_data);
                // exit();
                $designation_model->save();
           }
           return back()
           ->with('success','Data Updated Successfully');
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
        Department::find($id)->delete();
        Designation::where('department_id',$id)->delete();
        return back()
        ->with('success','Data Deleted Successfully');
    }
}
