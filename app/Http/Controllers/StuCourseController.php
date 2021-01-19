<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Class_Timings;

class StuCourseController extends Controller
{
    public function index(){
    	$courses=DB::Select('select * from courses group by course_name');
  
         return view('courses_student',['courses'=>$courses]);
    }
    public function topics($course_id){
	$topics=DB::Select("select * from courses left join topics on courses.course_id=topics.course_id where courses.course_id='$course_id'");
	return view('courses_student',['topics'=>$topics]);
}
public function class_timings(Request $req){
	if(!empty(auth()->user()->email)){
	$data['name']= auth()->user()->name;
	$data['stu_id']= auth()->user()->id;
	$data['email']= auth()->user()->email;
	$data['timings']= $req->class_timings;
	$data['course_name']=$req->course_name;
    $data['price']=$req->price;
    $data['date']=date("Y-m-d");
	/*if(Class_Timings::where('stu_id', $data['stu_id'])
      ->update(['timings' => $data['timings'],'course_name'=>$data['course_name']=$req->course_name]))
	{
     return redirect('/stu_course')->with('status',"class scheduled updated successfully");
	}*/
	 $course = DB::Select("SELECT `course_name` FROM `class_timings` WHERE ((`course_name`='$req->course_name')&&(`email`='auth()->user()->email'))");
	 $timings = DB::Select("SELECT `timings` FROM `class_timings` WHERE ((`timings`='$req->class_timings')&&(`email`='auth()->user()->email'))");
	if ($course != null){
	return redirect('/stu_course')->with('failed',"you already scheduled for this course");
    }
     elseif($timings != null){
	return redirect('/stu_course')->with('failed',"you already scheduled your class by this time");
   }
	elseif(Class_Timings::insert($data)){
	return redirect('/stu_course')->with('status',"class scheduled successfully");
   }
    else{
    	return redirect('/stu_course')->with('failed',"class not scheduled ");
    }
}
else{
	return redirect('/ajax_login');
}
}

}
