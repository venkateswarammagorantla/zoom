
@extends('basichtmllinks')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
  <div class="jumbotron">
  	@if (session('status'))
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ session('status') }}
</div>
@elseif(session('failed'))
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ session('failed') }}
</div>
@endif
  	
  	<center><a href="{{ route('addcourse') }}" class="btn btn-warning">Add Course</a>&emsp;<a href="{{ route('stu_enrolled') }}" class="btn btn-warning">Enrolled Students</a>&emsp;<a href="{{ route('generate_excel_courses') }}" class="btn btn-primary">Available Courses Report</a>&emsp;<button class="btn btn-primary" data-toggle="modal" data-target="#weeklyReport">Weekly Report</button>&emsp;&emsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#DailyReport">
    Daily Report
  </button><a href="{{ route('risied_tickets') }}" class="btn btn-warning">Tickets</a></center>
  	<div class="modal" id="DailyReport">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">DailyReport</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{ route('dailyreport') }}">
    <div class="form-group">
    <input type="date" name="date" class="form-control">
      <label for="course_name">Select Course</label>
      <select class="form-control" id="course_name" name="course_name">
        <option>AllCourses</option>
        <option>java</option>
        <option>python</option>
        <option>c</option>
        <option>php</option>
        <option>c#</option>
        <option>javascript</option>
        <option>css</option>
        <option>c++</option>
        <option>sql</option>
      </select>
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<div class="modal" id="weeklyReport">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">weeklyReport</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{ route('weeklyReport') }}">
    <div class="form-group">
    <label>Date_start</label><input type="date" name="from_date" class="form-control">
    <label>Date_end</label><input type="date" name="to_date" class="form-control">
      <label for="course_name">Select Course</label>
      <select class="form-control" id="course_name" name="course_name">
        <option>AllCourses</option>
        <option>java</option>
        <option>python</option>
        <option>c</option>
        <option>php</option>
        <option>c#</option>
        <option>javascript</option>
        <option>css</option>
        <option>c++</option>
        <option>sql</option>
      </select>
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

  	<?php if(!empty($courses)){?>
     <?php foreach($courses as $course)
  {?>
  	<?php $course_id=$course->course_id;?>
 <p style="background-color:white;"> <a href="{{URL::to('/topics/'.$course_id)}}" style="color:hotpink;height: 100px;font-size: 20px;"><?php echo $course->course_name;?></a>&emsp;<a href="{{URL::to('/delete_course/'.$course_id)}}"><i class="fa fa-trash" style="float: right;color:red;font-size: 30px;"></i></a></p>
 

<?php }?>
<?php }?>

@if(!(empty($topics)))

<table>
	<?php $i=1;?>
	<tr>
		<th>sr no.</th>
		<th>
			<?php echo $topics[0]->course_name;?> topics
		</th>
@foreach($topics as $topic)
<tr>
	<td><?php echo $i;?></td>&emsp;
   <td><?php echo $topic->topic_name;?></td>
</tr>
<?php $i++;?>
   @endforeach
  <center><a href="<?php echo $_SERVER['HTTP_REFERER']?>"><span style="font-size: 20px;">&#x2190;</span>Go Back</a></center>
   @endif
</table>
@if(!(empty($stus_enrolled)))
<table  width="600" border="1" cellspacing="5" cellpadding="5">
	<?php $i=1;?>
	<tr>
		<th>sr no.</th>
		<th>
			Stu_Name
		</th>
		<th>Email</th><th>Couse_Name</th><th>Batch</th>
	</tr>
@foreach($stus_enrolled as $stu_enrolled)
<tr>
	<td><?php echo $i;?></td>&emsp;
   <td><?php echo $stu_enrolled->name;?></td>
   <td><?php echo $stu_enrolled->email;?></td>
   <td><?php echo $stu_enrolled->course_name;?></td>
   <td><?php echo $stu_enrolled->timings;?></td>
</tr>
<?php $i++;?>
   @endforeach
   
</table>
<center><a href="<?php echo $_SERVER['HTTP_REFERER']?>"><span style="font-size: 20px;">&#x2190;</span>Go Back</a></center>
@endif
@if(session()->has('admin_email'))
<a href="{{ route('admin.logout') }}">Admin Logout</a>
@endif
  </div></div>
  