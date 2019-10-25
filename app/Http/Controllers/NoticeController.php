<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Notice;
use Validator;
use Carbon\Carbon;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      
    public function index()
    {
        $data['notice'] = Notice::get();
        return view('Admin.Notice.notice',$data);
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
        $notice = new Notice;
        $validator = Validator::make($request->all(),$notice->validation());

        if($validator->fails())
        {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        else
        {   
            
            if($request->attachment)
            {
                $replace_arr = [' ','-',':'];
                $current_date_time = str_replace($replace_arr,'_',Carbon::now()->toDateTimeString());
                // Image Upload
                $file = $request->file('attachment');
                $destinationPath = 'file/';
                $originalFile = 'notice_'.$current_date_time. '.' .$file->getClientOriginalExtension();
                $file->move($destinationPath, $originalFile);

                // Array Set And Save
                $all_data = $request->all();
                $all_new_data = Arr::set($all_data,'attachment',$originalFile);
                $notice->fill($all_new_data)->save();
            }
            else
            {
                $notice->fill($request->all())->save();
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
        $notice = Notice::find($id);
        if($notice->status=='1')
        {
           $notice->update(['status'=>'0']); 
        }
        else
        {
           $notice->update(['status'=>'1']);  
        }

        return back()
        ->with('success','Status Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['notice'] = Notice::find($id);
        return view('Admin.Notice.edit_notice',$data);
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
        $notice = new Notice;
        $validator = Validator::make($request->all(),$notice->validation());

        if($validator->fails())
        {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        else
        {   
            $replace_arr = [' ','-',':'];
            $current_date_time = str_replace($replace_arr,'_',Carbon::now()->toDateTimeString());
            // Image Upload
            $file = $request->file('attachment');
            $destinationPath = 'file/';
            $originalFile = 'notice_'.$current_date_time. '.' .$file->getClientOriginalExtension();
            $file->move($destinationPath, $originalFile);

            // Array Set And Save
            $all_data = $request->all();
            $all_new_data = Arr::set($all_data,'attachment',$originalFile);
            $notice->find($id)->fill($all_new_data)->save();

            return redirect('/notice')
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
        Notice::find($id)->delete();
        return back()
        ->with('success','Data Deleted Successfully');
    }
}
