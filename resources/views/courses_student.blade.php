
@extends('basichtmllinks')

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
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(!empty(auth()->user()->name))
  	<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#opennewticket">Open New Ticket</button>&emsp;<a href="{{route('ticket_history')}}" class="btn btn-primary">Ticket History</a></center>
    @endif
    <div class="modal" id="opennewticket">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Open New Ticket</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{ route('newticket.insert') }}" method="post">
    <div class="form-group">
    <label>Title</label><input type="text" name="title" class="form-control">
    <label>Priority</label><select name="priority" class="form-control">
      <option>High</option>
      <option>Medium</option>
      <option>Low</option>
    </select>
    <label>Description</label><textarea name="description" class="form-control"></textarea><br>

      
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
      <h2>Courses Avaliable</h2>
     <?php foreach($courses as $course)
  {?>
  	<?php $course_id=$course->course_id;?>
  <a href="{{URL::to('/stu_topics/'.$course_id)}}" style="color:hotpink;background-color:white;height: 100px;font-size: 20px;"><?php echo $course->course_name;?><?php echo "@".$course->price;?><?php echo "Rs."?>&emsp;&emsp;</a>
 

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
   
   
   
</table>
<center><button class="btn btn-primary" data-toggle="collapse" data-target="#demo"><a href="#" style="color:white;">Enroll a <?php echo $topics[0]->course_name;?> class</a></button>&emsp;
    <form action="{{ route('class_timings') }}" id="demo" class="collapse" method="post">
      <label>10AM_Batch</label><input type="radio" name="class_timings" value="10AM_batch"><br>
      <label>11AM_Batch</label><input type="radio" name="class_timings" value="11AM_batch"><br>
      <label>12PM_Batch</label><input type="radio" name="class_timings" value="12PM_batch"><br>
      <label>2PM_Batch</label><input type="radio" name="class_timings" value="2PM_batch"><br>
      <label>3PM_Batch</label><input type="radio" name="class_timings" value="3PM_batch"><br>
      <input type="hidden" name="course_name" value="<?php echo $topics[0]->course_name;?>">
      <input type="hidden" name="price" value="<?php echo $topics[0]->price;?>">


      <input type="submit" value="confirm" class="btn btn-primary">
    </form>
    <center><a href="<?php echo $_SERVER['HTTP_REFERER']?>"><span style="font-size: 20px;">&#x2190;</span>Go Back</a></center>
    @if(!empty(auth()->user()->name))<a href="{{ route('ajax_logout') }}" style="float: right;">Logout</a>
  @endif</center>
  @endif
  @if(!(empty($ticket_history)))
<table width="600" border="1" cellspacing="5" cellpadding="5">
  <?php $i=1;?>
  <tr>
    <th>sr no.</th>
    <th>
      title
    </th>
    <th>priority</th>
    <th>description</th>
    <th>status</th>
@foreach($ticket_history as $ticket)
<tr>
  <td><?php echo $i;?></td>&emsp;
   <td><?php echo $ticket->title;?></td>
   <td><?php echo $ticket->priority;?></td>
   <td><?php echo $ticket->description;?></td>
   <td><?php echo $ticket->status;?></td>
</tr>
<?php $i++;?>
   @endforeach

  @endif


 