<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Expense;
use App\Employee;
use Validator;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employee'] = Employee::get();
        $data['expense'] = Expense::join('employee','expense.purchase_from','=','employee.employee_id')
        //->select('employee.employee_name','expense.id as expense_id','expense.item_name','expense.purchase_date','expense.ammount_price','expense.attach_bill')
        ->get();
        return view('Admin.Expense.expense',$data);
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
        $expense = new Expense;
        $validator = Validator::make($request->all(),$expense->validation());
        if($validator->fails())
        {
            return back()
            ->withErrors($validator)
            ->withinput();
        }
        else
        {
            $data = Employee::where('employee_id',$request->purchase_from)
            ->get();
            if($data->isEmpty())
            {
                return back()
                ->with('error','Wrong Input');
            }
            else
            {
                // Image Upload
                $file = $request->file('attach_bill');
                $destinationPath = 'file/';
                $originalFile = time(). '.' .$file->getClientOriginalExtension();
                $file->move($destinationPath, $originalFile);

                // Array set new Data
                $data = $request->all();
                $new_data = Arr::set($data,'attach_bill',$originalFile);
                $expense->fill($new_data)->save();

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
        Expense::find($id)->delete();
        return back()
        ->with('success','Data Deleted Successfully');
    }
}
