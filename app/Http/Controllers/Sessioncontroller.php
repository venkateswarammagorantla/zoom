<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class Sessioncontroller extends Controller
{
    public function accessSessionData() {
      if(session()->has('my_name'))
         {
            echo session()->get('my_name');
         //echo "<br>";
         //echo Hash::make(session()->get('my_name'));
      }
      else
         echo 'No data in the session';
   }
   public function storeSessionData() {
      session()->put('my_name','Venky');
      echo "Data has been added to session";
   }
   public function deleteSessionData() {
      session()->forget('my_name');
      echo "Data has been removed from session.";
   }
}
