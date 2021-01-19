<!DOCTYPE html>
<html>
 <head>
  <title>Tickets</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Tickets</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Tickets</div>
    <div class="panel-body">
     <div id="message"></div>
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>title</th>
         <th>priority</th>
         <th>Description</th>
        </tr>
       </thead>
       <tbody>
       
       </tbody>
      </table>
      {{ csrf_field() }}
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
<script>
$(document).ready(function(){

 fetch_tickets();

 function fetch_tickets()
 {
  $.ajax({
   url:"http://localhost/test_laravel/public/admin/fetch_ticket",
   dataType:"json",
   success:function(data)
   {
    var html = '';
    
    for(var count=0; count < data.length; count++)
    {
     html +='<tr>';
     html += '<td  class="column_name" data-column_name="title" data-id="'+data[count].ticket_id+'">'+data[count].title+'</td>';
     html +='<td  class="column_name" data-column_name="priority" data-id="'+data[count].ticket_id+'">'+data[count].priority+'</td>';
     html += '<td  class="column_name" data-column_name="description" data-id="'+data[count].ticket_id+'">'+data[count].description+'</td>';
     html += '<td><button type="button" class="btn btn-danger btn-xs close" ticket_id="'+data[count].ticket_id+'">Close</button></td></tr>';
    }
    $('tbody').html(html);
   }
  });
 }
 var _token = $('input[name="_token"]').val()
 $(document).on('click', '.close', function(){
  var ticket_id = $(this).attr("ticket_id");
  if(confirm("Are you sure you want to close this ticket?"))
  {
   $.ajax({
    url:"{{ route('admin.close_ticket') }}",
    method:"POST",
    data:{ticket_id:ticket_id, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
     fetch_tickets();
    }
   });
  }
 });
});
 </script>