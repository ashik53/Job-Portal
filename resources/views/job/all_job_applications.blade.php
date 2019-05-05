@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'All job applications')

@section('content')
     

       <div class= "col ">


            <h2 class= "text-center mt-5"> All job applications for <span class="text-primary"> {{ $title }}</span></h2>
            <br>

            <div class="row">
              <div class ="col-10 offset-1">

                <table class= "table">

                  <thead>
                    <th>  # </th>
                    <th>  Name </th>
                    <th> CV </th>
                    <th> Actions</th>
                  </thead>
                  

                  <tbody>

                    @php
                      $inc = 0
                    @endphp
                    
                      @foreach($users as $user)
                        @php
                           $inc = $inc + 1 
                        @endphp
                        <tr>  
                            <td> {{ $inc }} </td>
                            <td class= "lead">  {{ $user->first_name." " }} {{ $user->last_name }} </td>
                           

                            <td> <a  href=" " class= "btn btn-info text-light">view </a></td>

                            <td> 
                              
                                <a  href=" " class= "btn btn-primary text-light">Profile </a> 
                                @if (Auth::check() == true && $jobOwner == Auth::user()->id)
                                  <a class= "btn btn-success text-light" href= "/accept-interview-req/{{ $serial}}/{{$user->id}}"> Approve and Mail </a>

                                  <a class= "btn btn-danger text-light " href="/delete-interview-req/{{ $serial}}/{{$user->id}}">Ignore </a>
                                @endif
                            </</td>
                          
                            
                        </tr>
                      @endforeach
                    
                  </tbody>

                </table>



              </div> {{-- col--}}
            </div> <!-- row-->

              


            

      </div> <!-- col -->



@endsection
  
