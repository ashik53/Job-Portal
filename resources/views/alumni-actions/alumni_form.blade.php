@extends('main') {{-- extends the structure of the main.blade.php--}}


@section('title', '| All Alumni requests')

@section('content')

     
       <div class= "col-8">

          @if (is_null($user) == true)
            <h4  class="text-center" style ="margin-top:30px;margin-bottom:30px"> Wanna be an alumni?Then click on button</h4>
            <a style="margin-left:25%" class="btn btn-success" href="/apply-for-alumni"> Submit Request</a>
          
          @else
              <h4 class="text-danger text-center" style ="margin-top:30px;margin-bottom:30px">Your request is on review, please wait </h4>
          @endif

        </div> <!-- class = col-8 -->

      

    

@endsection