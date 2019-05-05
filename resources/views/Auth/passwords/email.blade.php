@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', '')

@section('content')

    <div class="col-4 offset-3">
        @if (session('status'))
           <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email">E-Mail Address</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>                   
            </div>
            <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
    </div> {{-- col--}}
                        
@endsection
