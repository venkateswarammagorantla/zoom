<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AdminTicketController extends Controller
{
    public function fetch_ticket(Request $request){
    	if($request->ajax())
        {
            $data = DB::select("select * from `ticket_rising` where `status`!='closed' order By ticket_rising.ticket_id desc");
            echo json_encode($data);
        }
    } 
    public function risied_tickets(){
    	return view('risied_tickets');
    }
    public function close_ticket(Request $request){
    	if($request->ajax())
        {
                $result=DB::update("update `ticket_rising` set `status`='closed' where `ticket_id`='$request->ticket_id' ");
                if($result==true)
              echo '<div class="alert alert-success">Ticket Closed</div>';
        }
    }
}
