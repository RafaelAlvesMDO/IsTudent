@extends('layouts.form')

@section('title', 'Register - Landlord')

@section('body-class', 'bg-image bg-register-landlord d-flex flex-column min-vh-100')

@section('logo', 'img/IsTudent-Logo-White.png')

@section('navbar-class', 'navbar navbar-dark bg-transparent navbar-expand-lg')

@section('content')
<div class="card-wrapper">
    <div class="card card-register">
        <h2>Sign Up</h2>
        <p><strong>Want to be a landlord? Create your account now!</strong></p>

        <form method="POST" action="{{ route('register.landlord.submit') }}">
            @csrf

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-row">
                <div class="form-group">
                    <p>Full Name</p>
                    <input type="text" placeholder="First Last" name="name" required>
                </div>
                <div class="form-group">
                    <p>Email</p>
                    <input type="email" placeholder="your@email.com" name="email" required>
                </div>
                <div class="form-group">
                    <p>Phone Number</p>
                    <input type="tel" placeholder="82911112222" name="phone" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <p>CPF (Identification)</p>
                    <input type="text" placeholder="11122233344" name="cpf" required>
                </div>
                <div class="form-group">
                    <p>Birth Date</p>
                    <input type="date" name="birth_date" required>
                </div>
                <div class="form-group">
                    <p>Bank Code</p>
                    <input type="text" placeholder="001" name="bank_code" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <p>Branch</p>
                    <input type="text" placeholder="12345" name="branch" required>
                </div>
                <div class="form-group">
                    <p>Bank Account Number</p>
                    <input type="text" placeholder="12345678" name="account_number" required>
                </div>
                <div class="form-group">
                    <p>Account Type</p>
                    <select name="account_type" required>
                        <option disabled selected>Select Type</option>
                        <option value="checking">Checking</option>
                        <option value="savings">Savings</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <p>Password</p>
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">
                    <p>Confirm Password</p>
                    <input type="password" placeholder="Password" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Register</button>

                <div class="divider">Or</div>

                <p class="login-signup">Already have an account?
                    <a href="{{ route('login') }}">
                        Log in here
                    </a>
                </p>
                <p class="login-signup">Chose Wrong?
                    <a href="{{ route('register') }}">
                        Go back here
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection