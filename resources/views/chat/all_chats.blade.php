@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', '| All conversations')

@section('content')

	
		<div class="col-8 offset-3">
			
			<h2 class=""> Conversations with <span class="text-primary"> {{ $receiver->first_name }} </span></h2>
			<br>

			<div class="row">
				<div class="col">
					{{-- action('CallController@store') --}}
					<form  action="/chats/{{ $receiver->id }}" mehtod="get">
						@csrf
                  		 <div class = "input-group">
            				<input name ="body" class = "form-control input-lg" type="text" placeholder="Write your messages">
			
				    		<span class = "input-group-append">
					  			<button class="btn btn-success input-lg" type="submit">Send</button>
				    		</span>
        				 </div> {{-- input-group--}}
            		</form>
				</div> {{--col  --}}
			</div> {{-- row --}}
			<br> <br>

			{{-- show chat --}}
			@foreach($chats as $chat)
				<div class="row">

					@php

					@endphp
					<div class="col-2">
						<p class="font-weight-bold"> {{ $chat->sender_id == Auth::user()->id ? 'Me': $receiver->first_name }}</p>
					</div> {{-- col (show name of the person) --}}

					<div class="col-6">
						<p class="lead"> 
							{{ $chat->body }}
						</p>
					</div> {{-- col--}}
					<div class="col-2">
						<p class="text-muted"> 
							{{ $chat->created_at->diffForHumans() }}
						</p>
					</div> {{-- col--}}
				</div> {{-- row --}}
			@endforeach
			
			

		
		</div> <!-- col-->
	


@endsection