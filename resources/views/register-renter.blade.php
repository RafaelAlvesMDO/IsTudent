@extends('layouts.form')

@section('title', 'Register - Renter')

@section('body-class', 'bg-image bg-register-renter d-flex flex-column min-vh-100')

@section('navbar-class', 'navbar navbar-white bg-transparent navbar-expand-lg')

@section('content')
<div class="card-wrapper">
    <div class="card card-register">
        <h2>Sign Up</h2>
        <p><strong>Want to be a Renter? Create your account now!</strong></p>

        <form method="POST" action="{{ route('register.renter.submit') }}">
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
                    <input type="text" placeholder="First and Last Name" name="name" required>
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
                    <p>Matriculation</p>
                    <input type="text" placeholder="1122334455" name="matriculation" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <p>College</p>
                    <select name="college_id" id="college_id" required>
                        <option disabled selected>Select College</option>
                        @foreach($colleges as $college)
                        <option value="{{ $college->id }}">{{ $college->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <p>Course</p>
                    <select name="course_id" id="course_id" required>
                        <option disabled selected>Select Course</option>
                        @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <p>Period</p>
                    <input type="text" placeholder="5" name="period" required>
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