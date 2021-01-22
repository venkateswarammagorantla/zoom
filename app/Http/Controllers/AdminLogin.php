<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AdminLogin extends Controller
{
    public function index(){
    	return view('admin_login');
    }
    public function validate_login(Request $request){
    	$email=$request->email;
    	$password=$request->password;
    $result=DB::select("select * from `course_admins` where (`email`='$email'&&`password`='$password')");
    if($result!=null){
    	session()->put('admin_email',$email);
        return view('courses');
    }
    else{
    	return redirect('admin_login');
    }

    }
    public function logout(){
    	session()->forget('admin_email');
    	return view('admin_login');
    }
}
