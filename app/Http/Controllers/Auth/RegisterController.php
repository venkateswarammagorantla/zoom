<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Validator;
use Mail;
use DB;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
  public function register()
  {

    return view('auth.register');
  }

  public function storeUser(Request $request)
  {
      
      $token = Str::random(60);
      User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'verification_token'=>$token,
      ]);
      $data = array('name'=>"$request->name");
      Mail::send('auth.email_verification',['token' => $token], function($message) {
         $result=DB::Select("SELECT `email` FROM `users` ORDER BY `users`.`id` DESC LIMIT 1");
         $email= $result[0]->email;
         $message->to($email, 'my website user')->subject
            ('Verification Mail');
         $message->from('venkateswarammagorantla9@gmail.com','venkateswaramma');
      });
      //echo " Check your inbox.";

      return view('auth.login')->with('success', 'we have sent verication email. please verify it');
  }

}