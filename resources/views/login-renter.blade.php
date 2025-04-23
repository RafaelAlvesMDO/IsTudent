@extends('layouts.form')

@section('title', 'Login - Renter')

@section('body-class', 'bg-image bg-login-renter d-flex flex-column min-vh-100')

@section('navbar-class', 'navbar navbar-white bg-transparent navbar-expand-lg')

@section('content')
<div class="card-wrapper">
    <div class="card">
        <form method="POST" action="{{ route('login.renter.submit') }}">
            <h2>Welcome back Renter!</h2>
            <p>Log in to start your experience</p>

            @csrf

            @if (session('login_error'))
            <div class="alert alert-danger">
                {{ session('login_error') }}
            </div>
            @endif

            <input type="email" placeholder="Email address" name="email" required>
            <input type="password" placeholder="Password" name="password" required>

            <button type="submit" class="btn">Login</button> <!-- Alterar caminho -->

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