
@if(!empty(auth()->user()->name))
<h1>This sample_paymentpage<h1>
  
	

<?php $id=1;?>
        <a href="{{URL::to('/ajax_login/'.$id)}}">Login</a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@else
<h1>your seesion expired please login</h1>

@endif