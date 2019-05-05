@extends('main')

@section('title', 'Reset Your password')

@section('content')

        <div class="col-5 offset-3">
            <h3> Change Password</h2><br> <br>
                <form method="POST" action="/change-password">
                    
                    @csrf

                    <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input type="password" class="form-control" name="old_password" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation"> Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary"> Reset Password
            </button>
                            
            </form>
               
        </div>
   

@endsection

