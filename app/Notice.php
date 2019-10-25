<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'notice';
    protected $fillable = ['title','description','notice_date','attachment','status'];

    public function validation()
    {
    	return [
    		'title' => 'required',
    		'description' => 'required',
    		'notice_date' => 'date|required',
    		'attachment' => 'nullable|mimes:pdf,docx',
    		'status' => 'in:0,1|required'
    	];
    }
}
