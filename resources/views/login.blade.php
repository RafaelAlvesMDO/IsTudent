@extends('layouts.form')

@section('title', 'Login')

@section('body-class', 'bg-image bg-login d-flex flex-column min-vh-100')

@section('navbar-class', 'navbar navbar-dark bg-transparent navbar-expand-lg')

@section('content')
<div class="card-wrapper">
    <div class="card">
        <h2>Login</h2>
        <p>Which are you?</p>

        <a href="{{ route('login-renter') }}" class="btn">Renter</a>

        <div class="divider">
            <span>or</span>
        </div>

        <a href="{{ route('login-landlord') }}" class="btn">Landlord</a>

        <hr>

        <p class="login-signup">Don't have an account?
            <a href="{{ route('register') }}">
                Sign up here
            </a>
        </p>
    </div>
</div>
@endsection