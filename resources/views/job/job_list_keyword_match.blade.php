@extends('main') {{-- extends the structure of the main.blade.php--}}


@section('title', 'All jobs by keyword')

@section('content')

       <div class= "col-10">
        
            <h2> <span class="text-success"> {{ count($jobs) }} </span>jobs are found on {{ $key }} skills. </h2>   


            <table class= "table">

            <thead>
              <th>  # </th>
              <th>  Title </th>
              <th>  Description </th>
              <th>  Skills</th>
              <th>  Action </th>
            </thead>

            <tbody>

              @php
                $inc = 0;
              @endphp

              @foreach ($jobs as $job)
                  @php
                    $inc = $inc + 1
                  @endphp

                  <tr>
                    <td> {{ $inc }}</td>
                    <td class ="lead"> {{ substr($job->title, 0, 20) }} {{ strlen($job->title) > 20 ? '...' : "" }} </td>
                    <td > {{ substr($job->description, 0, 100) }} {{ strlen($job->description) > 100 ? '...' : "" }}</td>
                
                    <td> <a href= "/jobs/{{ $job->id }}" class= "btn btn-primary text-light">View</a>
                  </tr>
                 
              @endforeach
                
            </tbody>

          </table>

          <div class="row"> 
            <div class="col-6 offset-5">
              {{ $jobs->links() }} 
            </div>
          </div>{{--row--}}

        </div> <!-- class = col-10 -->


       </div>

  
@endsection