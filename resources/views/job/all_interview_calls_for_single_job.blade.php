@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'All interview calls for a single job')

@section('content')
     

       <div class= "col ">


            <h2 class= "text-center mt-5"> All interview calls for <span class="text-primary"> {{ $job->title }}</span></h2>
            <br>

            <div class="row">
              <div class ="col-8 offset-2">

                <table class= "table">

                  <thead>
                    <th>  # </th>
                    <th>  Name </th>
                    <th> Actions </th>
                    
                  </thead>
                  

                  <tbody>

                    @php
                      $inc = 0
                    @endphp
                    
                      @foreach ($applications as $application)
                        @php   
                           $user = $users->values()->get($inc)
                        @endphp
                        @php   
                           $inc = $inc + 1
                        @endphp
                        <tr>  
                            <td> {{ $inc }} </td>
                            <td class= "lead">  {{ $user->first_name." " }} {{ $user->last_name }} </td>
                           

                            <td> <a  href="/profiles/{{ $user->id }}" class= "btn btn-info text-light">View </a></td>

                        </tr>
                      @endforeach
                    
                  </tbody>

                </table>



              </div> {{-- col--}}
            </div> <!-- row-->

              


            

      </div> <!-- col -->



@endsection
  
