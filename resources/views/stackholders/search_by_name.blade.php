@extends('main') {{-- extends the structure of the main.blade.php--}}


@section('title', 'Search by keyword')

@section('content')

     @if(Auth::user()->role == 1) 
        <div class="col-10"> 
     @else    
       <div class= "col-8 offset-2">
     @endif
          <h2> We found only <span class="text-success"> {{count($users) }} </span> matches...</h2>
          <br>

          <table class= "table">

            <thead>
              <th>  # </th>
              <th>  Name </th>
              <th>  Action </th>
            </thead>

            <tbody>

              @php
                $inc = 0;
              @endphp

              @foreach ($users as $user)
                  @php
                    $inc = $inc + 1
                  @endphp

                  <tr>
                    
                    <td> {{ $inc }}</td>
                    <td class ="lead"> {{ $user->first_name. " "}}{{ $user->last_name }} </td>
                    <td>  <a href= "/profiles/{{ $user->id }}"class="btn btn-success"> view Profile</a></td>
                    
                  </tr>
                
              @endforeach
                
            </tbody>

          </table>

          

        </div> <!-- class = col(main) -->

      

  
@endsection