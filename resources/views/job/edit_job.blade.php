@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Edit Job')

@section('content')
     

       <div class= "col-10 offset-2">
            <div class="row">
              <div class="col">
                <a href="jobs/{{ $work->id }}"> <h1 class= "text-center mt-5 text-dark"> Edit Job Post   <span class="text-primary"> {{ $work->title }}  </span>  </h1> </a>
                <hr>
              </div>
            </div>
            
              <form method="POST" action="/jobs/{{ $work->id}}">
                
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                  <div class = "form-group"> 
                      <label for="title"> <span class="font-weight-bold">Post title  </span> </label>
                      <input class = "form-control" type="text" name = "title" value = "{{ $work->title }}" required> 
                  </div>

                  <div class = "form-group">
                    <label for="description"> <span class="font-weight-bold">Description </span> </label>
                    <textarea class = "form-control" type="text" name="description" rows="5" required> {{ $work->description }} </textarea> 
                  </div>
                  
                  <div class = "form-group"> 
                      <label for="company">  <span class="font-weight-bold">Company Name </span></label>
                      <input class = "form-control" type="text" name = "company" value = "{{ $work->company }}" required> 
                  </div>

                  <div class = "form-group"> 
                      <label for="requirements">  <span class="font-weight-bold">Requirements </span></label>
                      <input class = "form-control" type="text" name = "requirements" value = "{{ $work->requirements }}" required> 
                  </div>

                  <div class = "form-group"> 
                      <label for="experience">  <span class="font-weight-bold">Experience </span></label>
                      <input class = "form-control" type="text" name = "experience" value = "{{ $work->experience }}" required> 
                  </div>

                  <div class = "form-group"> 
                      <label for="salary">  <span class="font-weight-bold"> Salary </span></label>
                      <input class = "form-control" type="text" name = "salary" value = "{{ $work->salary }}" required> 
                  </div>
                  <div class = "form-group"> 
                      <label for="finished_date">  <span class="font-weight-bold">Deadline  </span> </label>
                      <input class = "form-control" type="date" name = "deadline" value = "{{ $work->deadline }}" required> 
                  </div>




                  <button class = "btn btn-success mt-3 btn-block" type="submit" >Update Job Post</button>

            </form>


            

      </div> <!-- col -->

    


@endsection
  
