<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Award;
use App\Employee;
use Validator;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employee'] = Employee::get();
        $data['award_data'] = Award::join('employee','award.employee_name','=','employee.employee_id')
        ->select('award.id','employee.employee_name','award.award_name','award.gift_item','award.gift_item','award.cash_price','award.month','award.year')
        ->get();
        return view('Admin.Award.award',$data);
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
        $award = new Award;
        $validator = Validator::make($request->all(),$award->validation());

        if($validator->fails())
        {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
            // For Wrong input by Inspect
            $emp_data = Employee::where('employee_id',$request->employee_name)
            ->get();
            if($emp_data->isEmpty())
            {
                return back()
                ->with('error','Wrong Input');
            }
            else
            {
                $award->fill($request->all())->save();

                return back()
                ->with('success','Data Inserted successfully');
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
        $data['award'] = Award::join('employee','award.employee_name','=','employee.employee_id')
        ->select('award.id','employee.employee_name as emp_name','employee.employee_id as emp_id','award.award_name','award.gift_item','award.gift_item','award.cash_price','award.month','award.year')
        ->find($id);
        return view('Admin.Award.edit_award',$data);
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
        $award = new Award;
        $validator = Validator::make($request->all(),$award->validation());

        if($validator->fails())
        {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
            // For Wrong input by Inspect
            $award_data = Award::where('employee_name',$request->employee_name)->get();
            if($award_data->isEmpty())
            {
                return back()
                ->with('error','Wrong Input');
            }
            else
            {
                $award->find($id)->fill($request->all())->save();
                return redirect('/award')
                ->with('success','Data Updated Successfully');
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
        Award::find($id)->delete();

        return back()
        ->with('success','Data Deleted Successfully');
    }
}
