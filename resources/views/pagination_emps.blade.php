
@extends('basichtmllinks')
<?php if(!empty($employees)){?>
    
  <?php
  $i=1;?>
  <?php $id="#model";?>
  <?php $id1="model";?>
  <?php foreach($employees as $employee)
  {?>
  
  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="<?php echo $id.$employee->emp_id;?>">Employee &emsp;<?php echo $employee->emp_name;?>&emsp;details</button><br>
  

<?php $i++;?>
    <div class="modal-dialog" >
<div class="modal" id="<?php echo $id1.$employee->emp_id;?>" >
      <div class="modal-content" style="width:700px;">
      
        
        <div class="modal-header">
          <h4 class="modal-title">Edit Employee</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        
        <div class="modal-body">
         <table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>Sr No</th>
    <th>Name</th>
    <th>Number</th>
    <th>Email</th>
  <th>Designation</th>
  <th>Salary</th>
  </tr> <tr>
  <td><?php echo $i;?></td><td><?php echo $employee->emp_name;?></td><td><?php echo $employee->phone;?></td>
  <td><?php echo $employee->email;?></td>
  <td><?php echo $employee->designation;?></td>
  <td><?php echo $employee->salary;?></td>
</tr></table>
           </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
<!-- <script>
  
function myfunction() {
  var id='<?php //echo $employee->emp_id;?>';
  var name='<?php //echo $employee->emp_name;?>';
  var phone='<?php //echo $employee->phone;?>';
  var email='<?php //echo $employee->email;?>';
  var designation='<?php //echo $employee->designation;?>';
  var salary='<?php //echo $employee->salary;?>';
  alert("Name:"+name+" "+"phone:"+phone+" "+"email:"+email+" "+"designation:"+designation+" "+"salary:"+salary);
  }
</script> -->
<?php }?>
   
  <?php }?>
  
 <!-- <?php //echo $employees->currentPage()?><br>
  <?php //echo $employees->count()?><br>
  <?php //echo $employees->lastPage()?><br>
  <?php //echo $employees->total()?><br>-->
  <div class="row">
        <ul class="pagination">
    <li class="page-item"><a class="page-link" href="<?php echo $employees->previousPageUrl()?>">Previous</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo $employees->nextPageUrl()?> ">Next</a></li>
  </ul>
    </div>
    