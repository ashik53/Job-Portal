@extends('main')

@section('title', 'Reset Your password')

@section('content')

        <div class="col-5 offset-3">
            <h4> Reset Password</h4>
                <form method="POST" action="{{ route('password.update') }}">
                    
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email">E-Mail Address</label>
                            <input type="email" class="form-control" name="email" required >    
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm"> Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary"> Reset Password
                        </button>
                            
            </form>
               
        </div>
   

@endsection

