<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employee_model;
use App\Emp_Salary_model;
use Validator;
use Input;
use DB;
class Employee_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "Hello javaTpoint".$id;
        return view('emp');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = DB::select('select * from `employee` left join `emp_salary` on employee.emp_id=emp_salary.emp_id');
        return view('emp',['employees'=>$employees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request,['name'=>'required','number'=>'required']);
        $emp=new Employee_model([
        'emp_name'=>$request->get('name'),
        'phone'=>$request->get('number'),]);
        $emp->save();
        //print_r($request);
        //echo $request->get('name');*/
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'number' => 'required',
            'email' => 'required|string|email|max:255',
            'designation' => 'required|string|min:3|max:255',
            'salary' => 'required|min:4|max:10'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('/post')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $employee = new Employee_model;
                $employee->emp_name = $data['name'];
                $employee->phone = $data['number'];
                $employee->designation = $data['designation'];
                $employee->email = $data['email'];
                $employee->save();
                $salary=new Emp_Salary_model();
                $salary->salary=$data['salary'];
                $salary->emp_id= $employee->id;
                $salary->save();
                
               
                return redirect('/post')->with('status',"Insert successfully");
            }
            catch(Exception $e){
                return redirect('/post')->with('failed',"operation failed");
            }
        }
    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {
        
            $data = $request->input();
            $emp_name=$data['name'];
            $phone=$data['number'];
            $designation=$data['designation'];
            $email=$data['email'];
            $emp_id=$data['emp_id'];
            $salary=$data['salary'];
            $salary_id=$data['salary_id'];

            try{
               if(DB::update("update `employee` set `emp_name` ='$emp_name',`phone`='$phone',`designation`='$designation',`email`='$email' where `emp_id`='$emp_id' ")){
                   DB::update("update `emp_salary` set `salary` ='$salary'  where `salary_id` ='$salary_id' ");
               }
               else{
                return redirect('/post')->with('failed',"operation failed");
               }
                
               
                return redirect('/post')->with('status',"updated successfully");
            }
            catch(Exception $e){
                return redirect('/post')->with('failed',"operation failed");
            }
        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id)

    {
         $data = $id->input();
         $emp_id=$data['id'];

        if(DB::delete("delete from `employee` where `emp_id` ='$emp_id'"))
            return redirect('/post')->with('status',"Deleted successfully");
        else
            return redirect('/post')->with('failed',"Not Deleted ");
    }
    public function s($a){
       echo $a; echo "<br>";
       //echo $secsw; echo "<br>";
       echo $a;
    }
}
