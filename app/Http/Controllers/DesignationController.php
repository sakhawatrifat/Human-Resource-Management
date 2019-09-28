<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Designation;
use Validator;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['designation'] = Designation::get();
        return view('Admin.Designation.designation',$data);
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
        $validator = Validator::make($request->all(),[
            'designation_name' => 'required'
        ]);

        if($validator->fails())
        {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
            $data = new Designation;
            $data->fill($request
                 ->all())
                 ->save();

            return 
                back()
                ->with( 'success','Data Inserted Successfully' );
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
        $data['designation'] = Designation::find($id);
        return view( 'Admin.Designation.edit_designation',$data );
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
        $validator= Validator::make($request->all(),[
            'designation_name'=>'required'
        ]);
        if($validator->fails())
        {
            return back()
            ->withErrors()
            ->withInput();
        }
        else
        {
            $data = new Designation;
            $data->find($id)->fill($request->all())->save();
            return redirect('designation')
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
        //
    }
}
