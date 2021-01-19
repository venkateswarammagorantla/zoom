<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class Email_Verification extends Controller
{
    public function verify_Email($token){
    	$result=DB::update("UPDATE `users` SET `verified`=1 WHERE `verification_token`='$token'");
        if($result==TRUE){
        	return view('auth.login')->with('success', 'you have verified your email successuly');
        }

    }
}
