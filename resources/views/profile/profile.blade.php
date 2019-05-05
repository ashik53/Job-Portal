@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Profile ')

@section('content')
     
       @if (Auth::user()->role == 1)
        <div class= "col-10">
       @else 
        <div class="col-8 offset-2"> 
       @endif


          <h2 style="margin-bottom:20px" class="text-center"> Profile </h2>

          <div class="row">
              <div class="col-4">
                  <img  src="{{ Storage::url($user->img) }}" height="200" width="250">

                  {{--<img src="img/image5.jpg" class="img-fluid rounded" alt="Smiley face" style = "width:200px;height:200px"> --}}<br> <br>
                  @if (Auth::user()->id != $user->id && Auth::user()->role !=1)
                    <a href="/view-chats/{{$user->id}}" style="width:250px" class="btn btn-success text-light"> Message</a>
                  @endif
              </div> {{-- col--}}
              
              {{-- for info show--}}
              <div class="col-7 offset-1">
                <p> <span class="font-weight-bold"> Name: </span> {{ $user->first_name.' ' }} {{ $user->last_name }} </p>
                <p> <span class="font-weight-bold"> Email: </span> {{ $user->email }} </p>
                <p> <span class="font-weight-bold"> Cell: </span> {{ $user->cell }} <p>

                @if (Auth::user()->role != 1)

                  <p> <span class="font-weight-bold"> Father name: </span> {{ $user->father_name }} </p>
                  <p> <span class="font-weight-bold"> Mother name: </span> {{ $user->mother_name }} </p>
                @endif

                @if ($user->role == 3)


                  <p> <span class="font-weight-bold"> Skills: </span> {{ $user->skills }} <p>
                  <p> <span class="font-weight-bold"> ID: </span> {{ $user->student_id }} <p>
                  <p> <span class="font-weight-bold"> Batch: </span> {{ $user->batch }} <p>
                  <p> <span class="font-weight-bold"> Admission date: </span> {{ $user->admission_date }} </p>
                  <p> <span class="font-weight-bold"> Graduation date: </span> {{ $user->graduation_date }} </p>
                
                @endif

                @if ($user->role == 2)

                  <p> <span class="font-weight-bold"> Company name: </span> {{ $user->company_name }} </p>
                  <p> <span class="font-weight-bold"> Company Address: </span> {{ $user->company_address }} </p>
                  <p> <span class="font-weight-bold"> Join date: </span> {{ $user->job_join_date }} </p>
                  <p> <span class="font-weight-bold"> Job end date: </span> {{ $user->job_end_date }} </p>
                
                @endif
                
                @if (Auth::user()->role != 1)
                  <p> <span class="font-weight-bold"> CV: </span>

                    @if (is_null($user->cv))
                      <span class="text-danger font-weight-bold">  not submitted yet  </span> 
                    @else
                      <a class="text-danger font-weight-bold" href="/{{ $user->cv}}" download> CV of {{ $user->first_name }} </a> 
                    @endif
                    {{--<a href="{{ $doc->jayga}}" download >cv of ashik</a> --}}
                  </p>

                  <p> <span class="font-weight-bold">  Status: </span>  <span class="text-danger font-weight-bold"> {{ $user['role'] == 2 ? 'Alumni' : 'Student'}}  </span></p> 
                @endif
                {{-- implement later @if ($user->role == 1 || Auth::user()->id == $user->id)

                  <p> <span class="font-weight-bold"> Applied in: </span> {{ $user->jobs_applied_count }} jobs </p>

                @endif --}}
                
                <br>

                @if ( (Auth::check() == true ) && ($user->id == Auth::user()->id) )

                  <a href ="/profiles/{{Auth::user()->id }}/edit" class="btn btn-primary text-light btn-lg"> Update profile</a>
                  <a class="btn btn-info text-light btn-lg" href="/password-reset"> Change password</a>
                  <br> <br>

                @endif

                

              </div> {{--col --}}

          </div> {{-- row (image show)--}}
          
          {{-- user deletion (not for admin) --}}

            <div class="row">
              <div class="col">
                @if ( Auth::check() == true && Auth::user()->role == 1 )
                    <form method="POST" action="/profiles/{{Auth::user()->id }}">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-danger btn-block text-light"> Delete this user</button>
                    </form>  
                  @endif
              </div>
            </div>

       </div> {{-- col --}}

          


@endsection
  
