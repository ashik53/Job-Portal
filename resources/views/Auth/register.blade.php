@extends('main')

@section('title', '| Register here')

@section('content')

       <div class= "col-10 offset-1">

            <h1 class= "text-center"> Register here</h1>
            <hr>

              <form method="POST" action="{{ route('register') }}">

                @csrf

                  <div class = "form-group"> 
                      <label for="first_name"> First Name </label>
                      <input class = "form-control" type="text" id="first_name" name = "first_name"> 
                  </div>


                  <div class = "form-group"> 
                      <label for="last_name">Last Name</label>
                      <input class = "form-control" type="text" id="last_name" name = "last_name"> 
                  </div>

                  <div class = "form-group"> 
                      <label for="email"> Email</label>
                      <input class = "form-control" type="text" id="email" name = "email"> 
                  </div>

                  <div class = "form-group">
                      <label for="password">Password</label>
                      <input class = "form-control" type="password" name="password"  > 
                  </div>

                  <div class = "form-group">
                      <label for="confirm_password">Confirm Password</label>
                      <input class = "form-control" type="password" name="confirm_password"  > 
                  </div>

                  <div class ="row">
                    <div class="col-md-6">
                        <button class = "btn btn-success btn-block mt-3" type="submit" >Register</button>
                    </div>
                    <div class="col-md-6">

                      <a class = "btn btn-danger btn-block mt-3 text-light" href="{{ route('login') }}" style="text-decoration:none">
                        Already have an account

                      </a>
                    </div> <!-- col-->
                  </div> <!-- row -->


            </form>

        </div> {{-- col-10--}}
@endsection
