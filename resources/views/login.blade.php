@extends('layouts.form')

@section('title', 'Login')

@section('body-class', 'bg-image bg-login d-flex flex-column min-vh-100')

@section('navbar-class', 'navbar navbar-dark bg-transparent navbar-expand-lg')

@section('content')
<div class="card-wrapper">
    <div class="card">
        <h2>Welcome back</h2>
        <p>Log in to start your experience</p>

        <input type="email" placeholder="Email address">
        <input type="password" placeholder="Password">

        <a href="{{ route('home') }}" class="btn">Login</a>

        <a href="#" class="forgot">Forgot password?</a>
        <p class="login-signup">Don't have an account?
            <a href="{{ url('/register') }}">
                Sign up here
            </a>
        </p>
    </div>
</div>
@endsection