@extends('basichtmllinks')
@if(!empty(auth()->user()->name))
<div class="container">
  <h2>Add Course</h2>
  <form action="{{URL::to('/insertcourse')}}" method="post">
    <div>
     <label>Course_name</label> <input type="text" name="course"><br>
     <label>Price</label> <input type="text" name="price"><br><input type="submit" class="btn btn-primary" value="Add">
    </div>
    </form>
     @else
<h1>your seesion expired please login</h1>

@endif