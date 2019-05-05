

{{----}}

<div class="row">

	@if(Auth::check() == true && Auth::user()->role ==1)

		<div class = "col-2 border-right">
			<div class= "d-flex row-h1 flex-column justify-content-start"> 
	   			
	   			@if (Auth::user()->role ==1)
					<div class= "p-4 item-h1">
		   				
		   				<a href="/dashboard" class="text-info font-weight-bold"> Dashboard </a> <hr>

		   			</div>
	   		    @endif

	   			<div class = "p-4 item-h1">
	   				
	   				<a href="/show-all/{{2}}" class="text-success  font-weight-bold"> View all alumni </a><hr>

	   			</div>
	   			<div class= "p-4 item-h1">
	   				
	   				<a href="/show-all/{{3}}" class="text-warning font-weight-bold"> View all students </a>

	   			</div>
	   			{{--<div class = "p-4 item-h1">Flex Item3</div> --}}
			

			</div>
		</div> {{-- col-2 --}}

	@endif