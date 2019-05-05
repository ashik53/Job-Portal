@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'My posted  jobs')


@section('content')

		<div class="col-10 offset-1">
			
			<!-- all projects-->

		
		
		<h2 class="text-center"> You posted  <span class="text-success"> {{ count($jobs) }}</span> jobs.</h2>

		
		<br>
			@php
				$inc = 0
			@endphp

			@foreach ($jobs as $job)
				
				@if($inc %3 == 0)
					<div class="card-deck">

						<div class= "card text-center"> <!-- card 1-->
	            			<div style="height:200px"class = "card-header bg-success">
	                			<h3>{{ substr($job->title, 0, 50) }} {{ strlen($job->title) > 50 ? '...' : "" }}   </h3>
	            			</div>
	            			<div class = "card-body">
	                			<a class = "btn btn-info btn-block" href="jobs/{{ $job->id }}">View</a>
	            			</div>
	            			<div class = "card-footer text-muted bg-warning"> 
	                			<span class="text-muted"> posted by <span class="text-italic text-danger"> <a style="text-decoration: none" href="/profiles/{{ Auth::user()->id }} "> {{ Auth::user()->first_name}}. </a> </span> {{ $job->created_at->diffForHumans()}}</span>
	            			</div>
	        			</div> <!--  card 1-->
	        


				@else

					    <div class= "card text-center"> <!-- card 1-->
	            			<div style="height:200px" class = "card-header bg-success">
	                			<h3> {{ substr($job->title, 0, 50) }} {{ strlen($job->title) > 50 ? '...' : "" }}</h3>
	            			</div>
	            			<div class = "card-body">
	                			<a class = "btn btn-info btn-block" href="/jobs/{{ $job->id }}">View</a>
	            			</div>
	            			<div class = "card-footer text-muted bg-warning"> 
	                			<span class="text-muted"> posted by <span class="text-italic text-danger"> <a href="/profiles/{{ Auth::user()->id }} " style="text-decoration: none"> {{ Auth::user()->first_name }}.  </a></span> {{ $job->created_at->diffForHumans()}}</span>
	            			</div>
	        			</div>  

	        	@endif

				@if($inc % 3 == 2 || $inc == count($jobs)-1 ) </div>  <br> <!-- card deck--> @endif

				

				@php
					$inc = $inc + 1;
				@endphp
			@endforeach

			
		</div> {{-- col--}}
	
@endsection


