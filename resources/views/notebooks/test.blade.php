@extends('app')

@section('content')

   
<div class="container">
   <div id="guestbook">
    
	<article v-repeat="messages">

	  <h3>@{{model}}</h3>
	  <div class="body">
	  	@{{description}}
	  </div>
		<hr>
	</article>

	<pre>
		@{{ $data | json }}
	</pre>
	
</div>

</div>
@stop