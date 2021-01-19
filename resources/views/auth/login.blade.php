@extends('layouts.app')


<div class="container">
	@if (session('error'))
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ session('error') }}
</div>
@esleif(!empty($success))
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ ($success) }}
</div>
@endif
    <form action="{{URL::to('/login_authenticate')}}" method="post" >
    <label for="email">Email</label>

          <input type="email" class="form-control" name="email" placeholder="Enter Email" >
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter Password">
          @if(!empty($id))
          <input type="hidden" name="id" value="{{$id}}">
         @endif
          <input type="submit" class="btn btn-primary">
      </form>
</div>
