@if (Session::has('success')) 

	<div class= "alert alert-success" role ="alert">

		<strong>Success: </strong> {{ Session::get('success') }} {{-- value from 'success' named session --}}
		
	</div>

@endif

{{-- error showing while posting a new post --}}

@if (count($errors) > 0)

	<div class = "alert alert-danger" role="alert"> {{--botstrap danger alert is used --}}

		<strong>

			@if(count($errors) > 1)
				Errors
			@else 
				Eroor

			@endif
			
			:



	   </strong>

		<ul>
			@foreach($errors->all() as $error)
				<li> {{ $error }} </li>
			@endforeach
		</ul>

	</div>


@endif