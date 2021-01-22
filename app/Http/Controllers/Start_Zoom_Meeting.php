<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class Start_Zoom_Meeting extends Controller
{
    public function select(){
    	$meetings=DB::Select("SELECT * FROM `zoom_host` ");
    	return view('zoom_meetings')->with('meetings',$meetings);

    }
    public function meetinginwebsite(Request $request){
    	$url=$request->url;
    	return view('start_zoom_meeting')->with('url',$url);
    	
    }
}
