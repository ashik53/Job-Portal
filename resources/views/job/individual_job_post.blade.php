@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Individual job post | Alumni job portal')

@section('content')
       
    @if(Auth::user()->role == 1)
      <div class= "col-10">
    @else
       <div class= "col-10 offset-2">
    @endif
       

            <h3 class= "text-center" style ="margin-bottom:15px;margin-top:15px"> {{ $job->title }} </h3> {{-- job title php --}}
            

            <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Description</span>
              </div> 
              <div class="col-10">
                <p class="lead "> {{ $job->description }}</p>

              </div>
            </div> <!-- row-->

            <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Company</span>
              </div> 
              <div class="col-10">
                <p class="lead "> {{ $job->company }} </p>

              </div>
            </div> <!-- row-->

            <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Requirements</span>
              </div> 
              <div class="col-10">
                <p class="lead "> {{ $job->requirements }}</p>
              </div>
            </div> <!-- row-->

            <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Experience</span>
              </div> 
              <div class="col-10">
                <p class="lead text-italic"> At least <strong> {{ $job->experience }} </strong> years</p>

              </div>
            </div> <!-- row-->

            <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Salary</span>
              </div> 
              <div class="col-10">
                <p class="lead "> {{ $job->salary }} </p>

              </div>
            </div> <!-- row-->

            <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Deadline</span>
              </div> 
              <div class="col-10">
                <p class="lead "> {{ $job->deadline }}</p>

              </div>
            </div> <!-- row-->

            <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Posted by</span>
              </div> 
              <div class="col-10">
                <p class="text-muted text-primary">  <a href= "/profiles/{{ $owner->id }}">{{ $owner->first_name. ' ' }} {{ $owner->last_name }}  </a> </p>

              </div>
            </div> <!-- row-->

            {{-- .................apply job button..... --}}
            {{-- only authenticated user + (alumni /student)  can view this button --}}
            @if (Auth::check() == true && (Auth::user()->role == 3) && Auth::user()->id !=$owner->id)
              {{-- show cancel button first--}}
              @if (is_null($application) == false && ($application->user_id == Auth::user()->id))
                  <a href="/cancel-apply/{{ $job->id }}/{{ Auth::user()->id }}" class="btn btn-danger text-light btn-block" style="text-decoration:none"> Cancel Application </a>
              @else
                  {{-- or show application button--}}
                  <a href="/apply/{{ $job->id }}/{{ Auth::user()->id }}" class="btn btn-success text-light btn-block" style="text-decoration:none"> Apply in this Job </a> 
              @endif

            @endif

            
            {{--} only authenticated user + (the alumni who posted this job)  can view this button and edit job post--}}
            
            @if ((Auth::check() == true && $owner->id == Auth::user()->id))
                
                <a  style="margin-bottom:3px"href="/jobs/{{$job->id}}/edit" class="btn btn-info text-light btn-block" > Edit this job post</a> 
                
                
            @endif




            {{-- only authenticated user + (admin /the alumni who posted this job)  can view this button and delete job post--}}




            @if ((Auth::check() == true && $owner->id == Auth::user()->id) || (Auth::check() == true && Auth::user()->role ==1))
              <div class="form-group">
                <form method= "POST" action = "/jobs/{{ $job->id }}"> 
                  
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}

                  <button class="btn btn-danger text-light btn-block" type ="submit"> Delete this job</button>
                
                </form>
              </div>

            @endif
            

            <!-- view all job applicants link (only for admin / alumni who posted this job)-->
            
            @if (Auth::check() == true && ($owner->id == Auth::user()->id || Auth::user()->role ==1))

              <hr>
              <h4 class="text-center"> <span class="text-italic"> Wanna see all applicants for this job? </span> <a  class="text-warning" href= "/applications/{{ $job->id }}" style="text-decoration:none"> Click here </a> </h4>
              <h4 class="text-center text-muted"> <span class="text-italic"> Wanna see all applicants who called for interview? </span> <a  class="text-danger" href= "/all-interview-calls/{{ $job->id }}" style="text-decoration:none">  Come here</a> </h4>
            @endif

            {{-- show comments(for all)--}}
             
            {{-- first show the comment form--}}
            @if(Auth::user()->role != 1)
              <br>
              <h4> Comment </h4>
              <div class ="row">
                <div class="col">
                    <form method="POST" action="/add-comment/{{$job->id}}">
                        @csrf
                        <textarea  style="margin-bottom:3px"class="form-control" name="comment_body">Write something</textarea>
                        <button class="btn btn-success btn-block" type="submit"> Submit</button>
                    </form>
                </div> {{-- col--}}
              </div> {{-- row --}}
            @endif


            <div class ="row">

              <div class ="col">
                @if (count($comments))
                  <br>
                  <h4> {{ count($comments) }} Comments</h4>
                @endif 


                @php
                  $index = 0
                @endphp

                @foreach ($comments as $comment)

                  @php
                    $comment_owner = $commentors->values()->get($index);
                  @endphp

                 <p> {{ $comment->comment_body}}</p>
                 <p> <span class="font-weight-bold ">  By {{ $comment_owner->first_name }} </span>  <a  class="text-success">  </a></p>
                 <p class="text-muted text-success"> {{ $comment->created_at->diffForHumans() }} </p>
                 <hr>

                 @php
                    $index = $index + 1
                 @endphp
                @endforeach
              </div> {{--col--}}
            </div> {{-- row--}}
            

      </div> <!-- col -->



@endsection
  
