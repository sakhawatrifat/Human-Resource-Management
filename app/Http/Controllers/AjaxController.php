<?php

namespace App\Http\Controllers;
use Carbon;
use Illuminate\Http\Request;
use App\Holiday;

class AjaxController extends Controller
{
    public function holiday_list(Request $request)
    {
    	$holiday_list = Holiday::get();
    	//print_r($holiday_list);
    	foreach($holiday_list as $holiday)
    	{
    		//$month = $holiday->date;
    		$month = Carbon\Carbon::createFromFormat('Y-m-d', $holiday->date)->month;
    		
    		// if($request->allmonth == $month)
    		// {

    		// }
    	}
    	$all = Holiday::where($request->allmonth,$month);
    		

    }
}
