<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login()
    {

      return view('auth.login');
        //echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

    public function authenticate(Request $request)
    {
        

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            session()->put('email',$request->email);
            if($request->id==1)
                return redirect('sample_page');
            else
              return redirect()->intended('home');  
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }
    

    public function logout() {
        session()->forget('email');
      Auth::logout();

      return redirect('login');
    }

}