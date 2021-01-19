<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="jumbotron">
  <center><h3> Add,Edit and Delete Employees</h3>
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
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddEmp">
    Add Employee
  </button></center>

 
  <div class="modal" id="AddEmp">
    <div class="modal-dialog">
      <div class="modal-content">
      
        
        <div class="modal-header">
          <h4 class="modal-title">Add Employee</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        
        <div class="modal-body">
        <form action="{{URL::to('/store')}}" method="post">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
          <label for="phone">Phone</label>
          <input type="text" class="form-control" name="number" pattern="[7-9]{1}[0-9]{9}" placeholder="Enter Phone Number" >
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Enter Email" >
          <label for="designation">Designation</label>
          <input type="text" class="form-control" name="designation" placeholder="Enter Designation" >
          <label for="salary">Salary</label>
          <input type="text" class="form-control" name="salary" placeholder="Enter Salary" required >
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          {{csrf_field()}}
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
  <?php if(!empty($employees)){?>
    <table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>Sr No</th>
    <th>Name</th>
    <th>Number</th>
    <th>Email</th>
  <th>Designation</th>
  <th>Salary</th>
  <th>update</th>
  <th>Delete</th>
  </tr>
  <?php
  $i=1;?>
  <?php $id="#model";?>
  <?php $id1="model";?>
  <?php foreach($employees as $employee)
  {?>
  <tr>
  <td><?php echo $i;?></td>
  <td><?php echo $employee->emp_name;?></td>
  <td><?php echo $employee->phone;?></td>
  <td><?php echo $employee->email;?></td>
  <td><?php echo $employee->designation;?></td>
  <td><?php echo $employee->salary;?></td>

</tr>
 
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="<?php echo $id.$employee->emp_id;?>">Edit</button>
    <div class="modal" id="<?php echo $id1.$employee->emp_id;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        
        <div class="modal-header">
          <h4 class="modal-title">Edit Employee</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        
        <div class="modal-body">
        <form action="{{URL::to('/update')}}" method="post" >
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo $employee->emp_name;?>">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" name="number" pattern="[7-9]{1}[0-9]{9}" placeholder="Enter Phone Number "value="<?php echo $employee->phone;?>" >
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $employee->email;?>">
          <label for="designation">Designation</label>
          <input type="text" class="form-control" name="designation" placeholder="Enter Designation" value="<?php echo $employee->designation;?>">
          <label for="salary">Salary</label>
          <input type="text" class="form-control" name="salary" placeholder="Enter Salary"   value="<?php echo $employee->salary;?>">
          <input type="hidden" class="form-control" name="emp_id" placeholder="Enter Salary"   value="<?php echo $employee->emp_id;?>">
          <input type="hidden" class="form-control" name="salary_id" placeholder="Enter Salary"   value="<?php echo $employee->salary_id;?>">
           <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
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
  </div></td>
  <td> <form action="{{URL::to('/destroy')}}" method="post">
    <input type="hidden" name="id" value="<?php echo $employee->emp_id;?>">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="submit" value="Delete">
  </form>

  </tr>
  <?php  $i++;?>

  <?php }?>
   
  <?php }?>
    </div>     
  
</div>

</body>
</html>
