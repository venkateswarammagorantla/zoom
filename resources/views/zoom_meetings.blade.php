

@extends('basichtmllinks')

<div class="container">
  <div class="jumbotron">
@if(!(empty($meetings)))
<table width="600" border="1" cellspacing="5" cellpadding="5">
  <?php $i=1;?>
  <tr>
    <th>sr no.</th>
    <th>
      meetingId
    </th>
    <th>Join_url</th>
    <th>topic</th>
    <th>start_time</th>
    <th>Start</th>
</tr>
@foreach($meetings as $meeting)
<tr>
  <td><?php echo $i;?></td>&emsp;
   <td><?php echo $meeting->id?></td>
   <td><?php echo $meeting->join_url;?></td>
   <td><?php echo $meeting->topic;?></td>
   <td><?php echo $meeting->start_time;?></td>
   @if(session()->has('admin_email'))
   <td>
   	<form action="{{route('startzoomzeeting.meetinginwebsite')}}" method="post"><input type="hidden" name="url" value="<?php echo $meeting->join_url;?>">
   		<input type="submit" value="startsession" class="btn btn-primary"></form></td>
   @else
   <td>
   	<form action="{{route('startzoomzeeting.meetinginwebsite')}}" method="post"><input type="hidden" name="url" value="<?php echo $meeting->join_url;?>">
   		<input type="submit" value="joinclass" class="btn btn-primary"></form></td>
   @endif
</tr>

<?php $i++;?>

</div>
</div>
   @endforeach
</table>
  @endif

</div>
</div>
