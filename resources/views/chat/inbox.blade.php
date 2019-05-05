@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', '| All conversations')

@section('content')

	
		<div class="col-10 offset-1">
			
			<br>
			<h2 class="text-center"> My inbox</h2>
			<br>

			@php
				$inc = 0
			@endphp


			@foreach ($chats as $chat)
				
				@php
					$sender = $senders->values()->get($inc)
				@endphp

				<div class="row">
					
					<div class="col-10 offset-2">
						<p class="lead"> {{ $chat->body }}</p>
						<p > <span class="font-weight-bold"> Sent by: </span> <a href= "/profiles/{{ $sender->id }}">  {{ $sender->first_name }} <a> </p>
						<p class="text-muted"> {{ $chat->created_at->diffForHumans() }}</p>
						<p class="text-success"> <a href= "/view-chats/{{$sender->id}}"> See full converstions >>  <a/> </p>
					</div> {{-- col --}}

	               @php
						$inc = $inc + 1
				   @endphp

				</div> {{-- row --}}
				<hr>

			@endforeach
			
			

		
		</div> <!-- col-->
	


@endsection