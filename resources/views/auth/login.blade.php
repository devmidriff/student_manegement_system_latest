@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="login-container">
        <div class="login-header">
            <h1>Welcome back</h1>
            <p>Enter your credentials to access your account</p>
        </div>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            @error('error')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <div class="form-group @error('email') is-invalid @enderror">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group @error('password') is-invalid @enderror">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember me</label>
                </div>
            </div>

            <button type="submit" class="login-button">Sign In</button>
        </form>
    </div>



@endsection
