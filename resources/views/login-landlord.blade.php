@extends('layouts.form')

@section('title', 'Login - Landlord')

@section('body-class', 'bg-image bg-login-landlord d-flex flex-column min-vh-100')

@section('navbar-class', 'navbar navbar-dark bg-transparent navbar-expand-lg')

@section('content')
<div class="card-wrapper">
    <div class="card">
        <form method="POST" action="{{ route('login.landlord.submit') }}">
            <h2>Welcome back Landlord!</h2>
            <p>Log in to start your experience</p>

            @csrf

            @if ($errors->has('login_error'))
            <div class="alert alert-danger">
                {{ $errors->first('login_error') }}
            </div>
            @endif


            <input type="email" placeholder="Email address" name="email" required>
            <input type="password" placeholder="Password" name="password" required>

            <button type="submit" class="btn">Login</button>

            <a href="#" class="forgot">Forgot password?</a>
            <p class="login-signup">Don't have an account?
                <a href="{{ route('register') }}">
                    Sign up here
                </a>
            </p>
            <p class="login-signup">Chose Wrong?
                <a href="{{ route('login') }}">
                    Go back here
                </a>
            </p>
        </form>
    </div>
</div>
@endsection