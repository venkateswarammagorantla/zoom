@extends('layouts.app')


<div class="container">
    <form action="{{URL::to('/login')}}" method="post" >
    <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Enter Email" >
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter Password">
         
          <input type="submit" class="btn btn-primary">
      </form>
</div>
