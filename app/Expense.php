<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expense';
    protected $fillable = ['item_name','purchase_from','purchase_date','ammount_price','attach_bill'];

    public function validation()
    {
    	return [
    		'item_name' => 'required',
    		'purchase_from' => 'required',
    		'purchase_date' => 'date|required',
    		'ammount_price' => 'required',
    		'attach_bill.*' => 'mimes:pdf,txt,docx|required'
    	];
    }
}
