<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AjaxUserController extends Controller
{
    
       
    public function check(Request $request)
    {  
        $user = $request->username;
        $pass  = $request->password;
        $id=$request->id;
        if (auth()->attempt(array('name' => $user, 'password' => $pass)))

        {
            if($id==1) {
                return response()->json([ [2] ]);
            } 
            else{
            return response()->json([ [1] ]);
            }
        } 
        else
         {  
            return response()->json([ [3] ]);
         }  
    }

    public function ajax_logout(Request $request) 
    {
        Auth::logout();
        $request->session()->flush();
        return view('ajax_login');
        //return redirect()->route('user.ajax_login');
    }
    public function welcome() 
    {
       return view('ajax_welcome_page_after_login'); 
    }
    public function ajax_sample_payment_page(){
        return view('ajax_sample_payment_page');
    }


}