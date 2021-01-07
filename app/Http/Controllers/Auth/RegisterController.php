<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Validator;
class RegisterController extends Controller
{
  public function register()
  {

    return view('auth.register');
  }

  public function storeUser(Request $request)
  {
      
      
      User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
      ]);

      return redirect('login');
  }

}