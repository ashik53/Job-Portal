@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Profile ')

@section('content')
     

       <div class= "col-10 offset-2">

          <h2 style="margin-bottom:20px" class="text-center"> Profile </h2>

          <form method="POST" action="/profiles/{{ Auth::user()->id }}" enctype="multipart/form-data">

                 {{ method_field('PATCH') }}
                 {{ csrf_field() }}
                 <div class = "form-group"> 
                      <label for="first_name">  First Name</label>
                      <input class = "form-control" type="text" name = "first_name" value="{{ $user->first_name }}"> 
                  </div>

                  <div class = "form-group"> 
                      <label for="last_name">  Last Name</label>
                      <input class = "form-control" type="text" name = "last_name" value="{{ $user->last_name }}"> 
                  </div>


                  <div class = "form-group"> 
                      <label for="father_name">  Father Name</label>
                      <input class = "form-control" type="text" name = "father_name" value="{{ $user->father_name }}"> 
                  </div>

                  <div class = "form-group"> 
                      <label for="mother_name">  Mother Name</label>
                      <input class = "form-control" type="text" name = "mother_name" value="{{ $user->mother_name }}"> 
                  </div>

                  <div class = "form-group"> 
                        <label for="cell">  Cell</label>
                        <input class = "form-control" type="text" name = "cell" value ="{{ $user->cell }}"> 
                  </div>

                  @if(Auth::user()->role == 3)
                    <div class = "form-group"> 
                        <label for="student_id">  Student Id</label>
                        <input class = "form-control" type="text" name = "student_id" value="{{ $user->student_id }}"> 
                    </div>
                    <div class = "form-group"> 
                        <label for="batch">  Batch</label>
                        <input class = "form-control" type="text" name = "batch" value="{{ $user->batch }}"> 
                    </div>
                    <div class = "form-group"> 
                        <label for="admission_date"> Admission date </label>
                        <input class = "form-control" type="date" name = "admission_date" value="{{ $user->admission_date }}"> 
                    </div>
                    
                    <div class = "form-group"> 
                        <label for="graduate_date"> Graduate date </label>
                        <input class = "form-control" type="date" name = "graduate_date" value="{{ $user->graduate_date }}"> 
                    </div>

                                      

                   

                  @endif

                  <div class = "form-group"> 
                      <label for="skills">  Skills</label>
                      <input class = "form-control" type="text" name = "skills" value ="{{ $user->skills }}"> 
                  </div>

                  @if (Auth::user()->role ==2)

                    <div class = "form-group"> 
                        <label for="position">  Position</label>
                        <input class = "form-control" type="text" name = "position" value ="{{ $user->position }}"> 
                    </div>

                    <div class = "form-group"> 
                        <label for="company_name">  Company Name</label>
                        <input class = "form-control" type="text" name = "company_name" value ="{{ $user->company_name}}"> 
                    </div>
                    <div class = "form-group"> 
                        <label for="company_address">  Company Address</label>
                        <textarea class = "form-control" type="text" name = "company_address"> {{ $user->company_address}} </textarea> 
                    </div>

                    <div class = "form-group"> 
                        <label for="job_join_date"> Job join date </label>
                        <input class = "form-control" type="date" name = "job_join_date" value="{{ $user->job_join_date }}"> 
                    </div>

                    <div class = "form-group"> 
                        <label for="job_end_date"> Job end date </label>
                        <input class = "form-control" type="date" name = "job_end_date" value="{{ $user->job_end_date}}"> 
                    </div>

                  @endif

                  <div class = "form-group">
                    <label for="img">Update Image</label>
                    <input class = "form-control-file" type="file" name ="img"  > 
                    <small class = "form-text text-muted" >Max 2mb size</small> 
                  </div>

                  <div class = "form-group">
                    <label for="cv"> Update Your CV</label>
                    <input class = "form-control-file" type="file" name ="cv"> 
                    <small class = "form-text text-muted" >Max 2mb size</small> 
                  </div>

                  <button class = "btn btn-info mt-3 btn-block" type="submit" >Update</button>

            </form>



       </div> {{-- col --}}



@endsection
  
