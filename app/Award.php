<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $table = 'award';
    protected $primaryKey = 'id';

    protected $fillable = ['employee_name','award_name','gift_item','cash_price','month','year'];

    public function validation()
    {
    	return [
    		'employee_name' => 'required',
    		'award_name' => 'required',
    		'gift_item' =>'required',
    		'cash_price' => 'required',
    		'month' => 'required',
    		'year' => 'numeric | required'
    	];
    }
}
