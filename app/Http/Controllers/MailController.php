<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Exception;

class MailController extends Controller
{
   public function basic_email() {
      $data = array('name'=>"venkateswaramma");
   
     try {
     	Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('venkygorantla424@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('venkateswarammagorantla9@gmail.com','venkateswaramma');
      });
      echo "Basic Email Sent. Check your inbox.";
      throw new Exception();
      
   }
   catch(Exception $e){
   	echo $e->getMessage();
   }
}
   public function html_email() {
      $data = array('name'=>"venkateswaramma");
      Mail::send('mail', $data, function($message) {
         $message->to('venkygorantla424@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('venkateswarammagorantla9@gmail.com','venkateswaramma');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email() {
      $data = array('name'=>"venkateswaramma");
      Mail::send('mail', $data, function($message) {
         $message->to('venkygorantla424@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\xampp\htdocs\test_laravel\uploads\desert.jpg');
         //$message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('venkateswarammagorantla9@gmail.com','venkateswaramma');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}
