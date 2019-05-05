@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'All Notifications')

@section('content')

    @if(Auth::user()->role == 1)
       <div class= "col-8">
    @else
       <div class= "col-10 offset-1">
    @endif
            <h1 class= "text-center"> Notifications</h1>

            <div class="row">
               <div class="col-10 offset-2">

                @foreach ($alerts as $alert)
                  
                  {{-- notification 1--}}
                  @if ($alert->type == 1)
                    <div class = "card border-info"> 

                      <div class = "card-body "> 
                          <p> Your alumni request is accepted </p>
                          <p> Check your profile  </a> </span> </p>
                          <form method="POST" action="/alerts/{{ $alert->id}}">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button class="btn btn-danger" type="submit"> Remove</button>
                          </form>
                      </div>

                      <div class="card-footer text-muted bg-warning">
                         <p> {{ $alert->created_at->diffForHumans() }}</p>
                      </div>

                    </div>
                    <br>
     
                  {{-- notification 2--}}

                  @elseif($alert->type == 3)

                    <div class = "card border-info"> 

                      <div class = "card-body"> 
                          <p> Someone messaged you </p>
                          <p> Check your inbox  </p>
                          <form method="POST" action="/alerts/{{ $alert->id}}">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button class="btn btn-danger" type="submit"> Remove</button>
                          </form>
                      </div> {{-- body--}}
                      <div class="card-footer text-muted bg-warning">
                         <p> {{ $alert->created_at->diffForHumans() }}</p>
                      </div> {{-- footer--}}
                    </div>
                    <br>

                  @elseif($alert->type == 2)

                    <div class = "card border-success"> 

                      <div class = "card-body"> 
                          <p> You are selected for an interview </p>
                          <p> Check your email  </p>
                          <form method="POST" action="/alerts/{{ $alert->id}}">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button class="btn btn-danger" type="submit"> Remove</button>
                          </form>
                      </div> {{-- body--}}
                      <div class="card-footer text-muted bg-warning">
                         <p> {{ $alert->created_at->diffForHumans() }}</p>
                      </div> {{-- footer--}}
                    </div>
                    <br>


                  @endif
                @endforeach

              </div> {{-- col--}}
            </div>  {{-- row--}}  




              

      </div> <!-- col -->

    


@endsection
  
