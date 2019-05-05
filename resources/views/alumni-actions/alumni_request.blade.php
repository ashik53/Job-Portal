@extends('main') {{-- extends the structure of the main.blade.php--}}


@section('title', '| All Alumni requests')

@section('content')

     
       <div class= "col-10">

          <h2  class="text-center"> <span class="text-info">  {{ count($users) }} </span> students wants to be alumni</h2>
          
          <br>

          <table class= "table">

            <thead>
              <th>  # </th>
              <th>  Image </th>
              <th>  Name </th>
              <th>  Batch</th>
              <th>  CV </th>
              <th> Action </th>
            </thead>

            <tbody>

              @php
                $inc = 1
              @endphp

              @foreach ( $users as $user)

                <tr>
                  <td> {{ $inc }} </td>
                  <td>  </td>
                  <td class="lead">  {{ $user->first_name. ' '}} {{ $user->last_name }} <br>
                  <td> {{ $user->batch }} </td>
                  <td>  </td>
                  <td> <a href = "/profiles/{{ $user->id }}"class= "btn btn-primary text-light">View Profile </a> <a href="/accept-req/{{ $user->id}}"class= "btn btn-success text-light">Approve  </a>  <a href ="/delete-req/ {{ $user->id }}"class= "btn btn-danger text-light">Decline </a></</td>

                </tr>

                @php
                  $inc = $inc + 1
                @endphp

              @endforeach

                
            </tbody>

          </table>

          
        </div> <!-- class = col-10 -->

      

    

@endsection