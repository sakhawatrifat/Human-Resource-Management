<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holiday;
use Validator;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['holiday'] = Holiday::get();
        return view('Admin.Holiday.holiday',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $holidays = new Holiday;
        $validation = Validator::make($request->all(),$holidays->validation());

        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput();
        }
        else
        {
            $holidays->fill($request->all())->save();
            return back()
            ->with('success','Holiday Added Successfully');
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
        $data['holiday'] = Holiday::find($id);
        return view('Admin.Holiday.edit_holiday',$data);
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
        $holidays = new Holiday;
        $validation = Validator::make($request->all(),[
            'holiday_name' => 'required',
            'date' => "date|required|unique:holidays,date,$id"
        ]);

        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput();
        }
        else
        {
            $holidays->find($id)->fill($request->all())->save();
            return redirect('/holiday')
            ->with('success','Holiday Updated Successfully');
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
        Holiday::find($id)->delete();
        return back()
        ->with('success','Data Deleted Successfully');
    }
}
