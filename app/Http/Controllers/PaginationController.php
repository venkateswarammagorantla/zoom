<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class PaginationController extends Controller
{
	public function index(){
    $employees = DB::table('employee')
            ->leftJoin('emp_salary', 'employee.emp_id', '=', 'emp_salary.emp_id')
            ->paginate(5);
            return view('pagination_emps',['employees'=>$employees]);
        }
}
?>
