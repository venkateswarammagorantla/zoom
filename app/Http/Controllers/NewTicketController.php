<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\NewTicketModel;
use DB;

class NewTicketController extends Controller
{
    public function insert(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'priority'  => 'required',
            'description'=>'required|max:255',
        ]);
        $newticket=new NewTicketModel();
        $newticket->title =$request->title;
        $newticket->priority=$request->priority;
        $newticket->description=$request->description;
        $newticket->user_id=auth()->user()->id;
        $newticket->email=auth()->user()->email;
        $newticket->save();
        return redirect('stu_course')->with('status',"New Ticket Created successfully");

    }
    public function ticket_history(){
    	$user_id=auth()->user()->id;
    	$ticket_history=DB::Select("select * from `ticket_rising` where `user_id`='$user_id' order by ticket_id desc");
    	       
        return view('courses_student')->with('ticket_history',$ticket_history);

    }
}
