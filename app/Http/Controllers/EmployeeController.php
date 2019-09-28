<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Employee;
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
        $data['employee'] = Employee::get();
        return view('Admin.Employee.employee',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Employee.add_employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

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
        //
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
        //
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
