@extends('layouts.app')
@if(!empty(session()->get('email')))
<div class="container">
     <div class="row justify-content-center">
        <p style="text-align: right;"><a href="{{URL::to('/sample_page')}}">sample_page</a>&emsp;&emsp;<a href="{{URL::to('/logout')}}">Logout</a></p>
         <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                    <div class="card-body">
                       You are successfully logged in!
                    </div>
                    
               </div>
        </div>
    </div>
</div>
@else
<a href="{{URL::to('/login')}}">Login</a>
@endif
