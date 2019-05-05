@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', '| Create New Job Post')

@section('content')

       <div class= "col-8 offset-2">

            <h1 class= "text-center mt-5"> Post a Job</h1>
            <hr>

              <form method="POST" action="/jobs">

                @csrf

                  <div class = "form-group"> 
                      <label for="title"> Post title </label>
                      <input class = "form-control" type="text" name = "title" required> 
                  </div>

                  <div class = "form-group">
                    <label for="description"> Description</label>
                    <textarea class = "form-control" name="description" rows="2" required></textarea> 
                  </div>
                  
                  <div class = "form-group"> 
                      <label for="company_name">  Company Name</label>
                      <input class = "form-control" type="text" name = "company" required> 
                  </div>

                  <div class = "form-group"> 
                      <label for="requirements">  Requirements</label>
                      <input class = "form-control" type="text" name = "requirements" required> 
                  </div>

                  <div class = "form-group"> 
                      <label for="experience">  Experience</label>
                      <input class = "form-control" type="text" name = "experience" required> 
                  </div>

                  <div class = "form-group"> 
                      <label for="salary">  Salary</label>
                      <input class = "form-control" type="text" name = "salary" required> 
                  </div>
                  <div class = "form-group"> 
                      <label for="finished_date"> Deadline </label>
                      <input class = "form-control" type="date" name = "deadline" required> 
                  </div>




                  <button class = "btn btn-success mt-3 btn-block" type="submit" >Confirm Post</button>

            </form>


            

      </div> <!-- col -->

    


@endsection
  
