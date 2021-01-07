<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class StuExportExcelController extends Controller
{
    function index()
    {
     $students_data = DB::select("select stu_name,
         max(case when (subject='maths') then marks else NULL end) as 'maths',
         max(case when (subject='english') then marks else NULL end) as 'english',
         max(case when (subject='science') then marks else NULL end) as 'science'
         from students
         group by stu_name
         order by stu_name");
     return view('stu_export_excel')->with('students_data', $students_data);
    }

    function excel()
    {

     $students_data = DB::select("select stu_name,
         max(case when (subject='maths') then marks else NULL end) as 'maths',
         max(case when (subject='english') then marks else NULL end) as 'english',
         max(case when (subject='science') then marks else NULL end) as 'science'
         from students
         group by stu_name
         order by stu_name");
     $students_array[] = array('students Name', 'maths', 'englis','science');
     foreach($students_data as $students)
     {
      $students_array[] = array(
       'students Name'  => $students->stu_name,
       'maths'   => $students->maths,
       'english'    => $students->english,
       'science' =>$students->science
      
      );
     }
     Excel::create('students Data', function($excel) use ($students_array){
      $excel->setTitle('students Data');
      $excel->sheet('students Data', function($sheet) use ($students_array){
       $sheet->fromArray($students_array, null, 'A1', false, false);
      });
     })->download('csv');
    }
}

?>
