@extends('main') {{-- extends the structure of the main.blade.php--}}


@section('title', '| Stackholders')

@section('content')

     @if(Auth::user()->role == 1) 
        <div class="col-10"> 
     @else    
       <div class= "col-8 offset-2">
     @endif
          @if($key == 2)
            <h2  class="text-center"> There are <span class="text-info">  {{ $cnt }} </span>  students are already graduated from DIU.</h2>

          @elseif($key == 3)
            <h2  class="text-center"> <span class="text-info">  {{ $cnt }} </span> students are studying in DIU</h2>
          @elseif($key == 0)
            <h2  class="text-center">There are in total  <span class="text-info">   {{ $cnt-1 }} </span> students and alumnis</h2>
          @endif
          <br>

          <table class= "table">

            <thead>
              <th>  # </th>
              <th>  Name </th>
              
              @if ($key ==3)
                <th>  CV </th>
                
                <th>  Batch </th>
              @endif
              @if($key ==2)
                <th>  Company</th> {{-- if alumni--}}
                <th>  Position</th> {{-- if alumni--}}
                <th>  Cell Number </th> {{-- if alumni--}}
              @endif
              <th>  Action </th>
            </thead>

            <tbody>

              @php
                $inc = 0;
              @endphp

              @foreach ($users as $user)
                @if( ($user->role == $key || $key == 0) && $user->role!=1 )
                  @php
                    $inc = $inc + 1
                  @endphp

                  <tr>
                    <td> {{ $inc }}</td>
                    <td class ="lead"> {{ $user->first_name. " "}}{{ $user->last_name }} </td>
                    
                    
                    @if($key ==2)
                      <td>  {{-- is_null($user->comapany)? 'not-found': $user->company =--}}Microsoft</td>
                      <td> Software Engineer </td>
                      <td>  {{ is_null($user->cell)? 'not-found': $user->cell }} </td>
                    @endif

                    @if($key ==3)
                      <td > 

                        @if (is_null($user->cv))
                          <a class="text-danger font-weight-bold"> Not submitted</a>
                        @else 
                          <a class="btn btn-primary text-light" href="/{{ $user->cv}}" download> view</a>
                        @endif

                      </td>
                      
                      <td > {{ is_null($user->batch)? 'not-found': $user->batch }}</td>
                    @endif

                    

                    <td> <a href= "/profiles/{{ $user->id }}" class= "btn btn-primary btn-inline text-light">Profile</a> 
                    


                      @if (Auth::user()->role == 1)
                        
                         {{-- <form method="POST" action="/profiles/{{ $user->id }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button  class="btn btn-danger text-light" type="submit"> Delete </button> 
                          </form>  
                        --}}
                          @if ($user->role == 2)
                             <a  href ="/denote-to-student/{{$user->id}}" class="btn btn-info text-light" > Denote to Student  </a> 
                          @endif 
                          <a  href = "/delete-user/{{$user->id}}" class="btn btn-danger text-light" > Delete </a> 
                      
                          @if ($key == 3 )
                        
                            <a  href= "/accept-req/{{ $user->id}}"  class= "btn btn-info text-light"> Make alumni </a> 

                          @endif

                      @endif

                      @if (Auth::user()->role ==2)
                        <a href= "/view-chats/{{$user->id}}"  class= "btn btn-info text-light"> Message </a>
                      @endif
                    </td>

                  </tr>
                 @endif
              @endforeach
                
            </tbody>

          </table>

          <div class="row"> 
            <div class="col-6 offset-5">
              {{ $users->links() }} 
            </div>
          </div>{{--row--}}

        </div> <!-- class = col-10 -->

      

  
@endsection