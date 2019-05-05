@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', '| Admin dashboard')

@section('content')

       
    @if (Auth::user()->role == 1)

       <div class= "col-8">
        <div style="margin-top:50px;margin-left:80px">
         <div class = "card-deck"> 
              <div class = "card">
                  <div class = "card-body">
                      <h2 class = "card-title">Total Student</h2>
                      <h4> <span class="text-success"> {{ count($students) }} </span> students are studying in DIU</h4>
                  </div>
              </div>
              <div class = "card">
                  <div class = "card-body">
                      <h2 class = "card-title">Total alumni</h2>
                      <h4> <span class="text-success"> {{ count($alumnis) }} </span> alumnis are successfully graduated from DIU</h4>
                  </div>
              </div>
              <div class = "card">
                  <div class = "card-body">
                      <h2 class = "card-title">Total Post</h2>
                      <h4> <span class="text-success"> {{ count($jobs) }}</span> Job posts</h4>
                  </div>
              </div>
          </div>

        </div> {{-- container--}}    

      </div> <!-- col -->

    
     @endif

@endsection
  
