<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = 'holidays';
    protected $fillable = ['holiday_name','date'];

    public function validation()
    {
    	return[
    		'holiday_name' => 'required',
    		'date' => 'required|unique:holidays'
    	];
    }
}
