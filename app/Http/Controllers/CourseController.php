<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Email;
use App\AddTopics;
use App\Class_Timings;
use Excel;

class CourseController extends Controller
{
	public function addcourse(){

		return view('addcourse');
	}
	public function insertcourse(Request $req){

        $course_name=$req->course;
        $price=$req->price;
        $result=DB::Insert("INSERT INTO `courses` (`course_id`, `course_name`,`price`) VALUES (NULL, '$course_name',$price)");
        if($result==TRUE){
        	return view('addtopics')->with('course',$course_name);
        	//header("Location:addtopics")
        }
	}
	public function topicinsert(Request $request){
		if($request->ajax())
     {
     	$id=DB::table('courses')->orderBy('course_id','desc')->first();
     	$topic_name = $request->topic_name;
     	$course_id=$id->course_id;;
      for($count = 0; $count < count($topic_name); $count++)
      {
       $data = array(
        'topic_name' => $topic_name[$count],
        'course_id'=>$course_id
       );
       $insert_data[] = $data; 
      }

      AddTopics::insert($insert_data);
      return response()->json([
       'success'  => 'Topics Added successfully.'
      ]);
     }
    }
     
	public function select_all_couses(){
		$courses=DB::Select('select * from courses group by course_name');
  
  return view('courses',['courses'=>$courses]);
}
public function topics($course_id){
	$topics=DB::Select("select * from courses left join topics on courses.course_id=topics.course_id where courses.course_id='$course_id'");
	return view('courses',['topics'=>$topics]);
}
public function stu_enrolled(){
	$stus_enrolled=DB::Select("select * from `class_timings` ");
	//print_r($stus_enrolled);
	return view('courses',['stus_enrolled'=>$stus_enrolled]);
}
public function delete_course($course_id){
	$result=DB::Delete("Delete from `courses` where `course_id`='$course_id'");
	return redirect()->back();
}
public function generate_excel_courses(){
  $courses_data = DB::table('courses')->get();
     $courses_array[] = array('courses Name', 'price');
     foreach($courses_data as $courses)
     {
      $courses_array[] = array(
       'courses Name'  => $courses->course_name,
       'price'=>$courses->price
      );
     }
     Excel::create('courses Data', function($excel) use ($courses_array){
      $excel->setTitle('courses Data');
      $excel->sheet('courses Data', function($sheet) use ($courses_array){
       $sheet->fromArray($courses_array, null, 'A1', false, false);
      });
     })->download('csv');
}
public function dailyreport(Request $request){
  $date=$request->date;
  $course_name=$request->course_name;
  if($course_name=='AllCourses'){
  $courses_data=DB::Select("SELECT count('course_name') as number_of_students,course_name,price,email FROM `class_timings` WHERE `date`='$date' group by course_name");
}
else{
  $courses_data=DB::Select("SELECT count('course_name') as number_of_students,course_name,price,email FROM `class_timings` WHERE ((`date`='$date')&&(`course_name`='$course_name')) group by course_name");
}
$total=0;
  $courses_array[] = array('course_name', 'price','email','totalRevenue','number_of_students');
     foreach($courses_data as $courses)
     {
      $total+=($courses->price)*($courses->number_of_students);
      $courses_array[] = array(
       'courses Name'  => $courses->course_name,
       'price'=>$courses->price,
       'email'=>$courses->email,
       'totalRevenue'=>$total,
       'number_of_students'=>$courses->number_of_students,
      );
     }
     Excel::create('daily courses report', function($excel) use ($courses_array){
      $excel->setTitle('daily courses report');
      $excel->sheet('daily courses report', function($sheet) use ($courses_array){
       $sheet->fromArray($courses_array, null, 'A1', false, false);
      });
     })->download('csv');
}
public function weeklyReport(Request $request){
  $from_date=$request->from_date;
  $to_date=$request->to_date;
  $course_name=$request->course_name;
  if($course_name=='AllCourses'){
  $courses_data=DB::Select("SELECT count('course_name') as number_of_students,course_name,price,email FROM `class_timings` WHERE ((`date`>='$from_date')&&(`date`<='$to_date')) group by course_name");
}
else{
  $courses_data=DB::Select("SELECT count('course_name') as number_of_students,course_name,price,email FROM `class_timings` WHERE (((`date`>='$from_date')||(`date`<='$to_date'))&&(`course_name`='$course_name')) group by course_name");
}
$total=0;
  $courses_array[] = array('course_name', 'price','email','totalRevenue','number_of_students');
     foreach($courses_data as $courses)
     {
      $total+=($courses->price)*($courses->number_of_students);
      $courses_array[] = array(
       'courses Name'  => $courses->course_name,
       'price'=>$courses->price,
       'email'=>$courses->email,
       'totalRevenue'=>$total,
       'number_of_students'=>$courses->number_of_students,
      );
     }
     Excel::create('daily courses report', function($excel) use ($courses_array){
      $excel->setTitle('daily courses report');
      $excel->sheet('daily courses report', function($sheet) use ($courses_array){
       $sheet->fromArray($courses_array, null, 'A1', false, false);
       
      });
     })->download('csv');
}
}


