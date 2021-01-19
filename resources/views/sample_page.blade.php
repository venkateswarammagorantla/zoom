@extends('layouts.app')

<div class="container">
     <div class="row justify-content-center">
        <?php $id=1;?>
        <a href="{{URL::to('/login/'.$id)}}">Login</a>
         <div class="col-md-8">
            <div class="card">
                <div class="card-header">sample_page</div>
                    <div class="card-body">
                        
                       You are  in sample_page
                    </div>
                    
               </div>
        </div>
    </div>
</div>

