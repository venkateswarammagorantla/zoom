@extends('layouts.app')


<div class="container">
    <form action="{{URL::to('/register')}}" method="post" >
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Enter Name" >
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Enter Email" >
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter Password">
          <label>Confirm Password</label>
          <input type="password" class="form-control" name="confpassword" placeholder="Conf Password">
           <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
