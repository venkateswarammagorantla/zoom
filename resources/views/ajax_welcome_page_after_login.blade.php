
@if(!empty(auth()->user()->name))
<h1>This is welcome<h1>
  
	<h1>{{ auth()->user()->name }}</h1>

<p><a href="{{ route('payment.ajax_sample_payment_page') }}">sample_payment_page</a></p>
@else
<h1>your seesion expired please login</h1>

@endif