@extends('layouts.form')

@section('title', 'Register')

@section('body-class', 'bg-image bg-register d-flex flex-column min-vh-100')

@section('navbar-class', 'navbar navbar-white bg-transparent navbar-expand-lg')

@section('content')
<div class="card-wrapper">
    <div class="card">
        <h2>Sign Up</h2>
        <p>Which are you?</p>

        <a href="#" class="btn">Renter</a>

        <div class="divider">
            <span>or</span>
        </div>

        <a href="#" class="btn">Landlord</a>

        <p class="terms">
            By signing up, you agree with the Terms and Conditions.
            IsTudent will process your personal data according to
            our Privacy Policy.
        </p>

        <hr>

        <p class="login-signup">Already have an account?
            <a href="{{ url('/login') }}">
                Log in here
            </a>
        </p>
    </div>
</div>
@endsection