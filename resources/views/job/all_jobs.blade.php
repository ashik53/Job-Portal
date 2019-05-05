@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', '| All jobs')


@section('content')

	@if(Auth::user()->role == 1)
		<div class="col-10">
	@else 
		<div class="col-10 offset-1">
	@endif		
			<!-- all projects-->

			@if (Request::url() === 'http://127.0.0.1:8000/jobs')
				
					<h2 class="text-center"> There are  <span class="text-success"> {{ count($jobs) }} </span> jobs are available </h2> 
		
			@elseif(Request::url() === 'http://127.0.0.1:8000/posted-jobs')
				
					<h2 class="text-center"> You posted   <span class="text-success"> {{ count($jobs) }}</span> jobs.</h2>
			@elseif(Request::url() === 'http://127.0.0.1:8000/show-interview-calls')
				
					<h2 class="text-center"> <span class="text-success"> {{ count($jobs) }}</span> jobs called you for interview.</h2>
		
			@elseif(Request::url() === 'http://127.0.0.1:8000/applied-jobs') 
				<h2 class="text-center"> You applied in    <span class="text-success"> {{ count($jobs) }}</span> jobs.</h2>

			@endif
			<br>

			@php
				$inc = 0
			@endphp

			@foreach ($jobs as $job)
				
				@if($inc %3 == 0)
					<div class="card-deck">

						<div class= "card text-center"> <!-- card 1-->
	            			<div style="height:200px" class = "card-header bg-success">
	                			<h3> {{ substr($job->title, 0, 50) }} {{ strlen($job->title) > 50 ? '...' : "" }}  </h3>
	            			</div>
	            			<div class = "card-body">
	                			<a href="jobs/{{ $job->id }}" class = "btn btn-info btn-block" >View</a>
	            			</div>
	            			<div class = "card-footer text-muted bg-warning"> 
	                			<span class="text-danger"> posted  <span class="text-italic text-danger"> <a style="text-decoration: none" href=" ">    </a> </span> {{ $job->created_at->diffForHumans()}}</span>
	            			</div>
	        			</div> <!--  card 1-->
	        


				@else

					    <div class= "card text-center"> <!-- card 1-->
	            			<div style="height:200px" class = "card-header bg-success">
	                			<h3> {{ substr($job->title, 0, 50) }} {{ strlen($job->title) > 50 ? '...' : "" }}  </h3>
	            			</div>
	            			<div class = "card-body">
	                			<a href="/jobs/{{ $job->id }}" class = "btn btn-info btn-block" >View</a>
	            			</div>
	            			<div class = "card-footer text-muted bg-warning"> 
	                			<span class="text-danger"> posted  <span class="text-italic text-danger"> <a style="text-decoration: none" href=""> </a></span> {{ $job->created_at->diffForHumans()}}</span>
	            			</div>
	        			</div>  

	        	@endif

				@if($inc % 3 == 2 || $inc == count($jobs)-1 ) </div>  <br> <!-- card deck--> @endif

				

				@php
					$inc = $inc + 1;
				@endphp
			@endforeach

			@if (Request::url() === 'http://127.0.0.1:8000/jobs')
				<div class="row"> 
					<div class="col-6 offset-5">
						{{ $jobs->links() }} 
					</div>
				</div>{{--row--}}
			@endif
		</div> {{-- col--}}
	
	
@endsection


