@extends('layouts.base')

@section('title', 'Register - Room')

@push('Card')
<link rel="stylesheet" href="{{ asset('css/Card.css') }}">
@endpush

@section('content')
<div class="card-wrapper">
    <div class="card card-register">
        <h2>Register</h2>

        <form method="POST" action="{{ route('register.room.submit') }}" enctype="multipart/form-data">
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
                    <p>Image Preview</p>
                    <div class="image-input-cardwrapper">
                        <img id="imagePreview" src="#" alt="Image preview"
                            style="display:none; max-width: 100%; margin-top: 0px; border-radius: 5px;" />
                    </div>
                </div>
                <div class="form-group">
                    <p>Title</p>
                    <input type="text" placeholder="Room in Fernandes Lima" name="title" required>
                </div>
                <div class="form-group">
                    <p>Address</p>
                    <input type="text" placeholder="" name="address" required>
                </div>
                <div class="form-group">
                    <p>Price p/month</p>
                    <input type="number" placeholder="120.0" name="monthly_price" required>
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
            </div>

            <div class="form-row">
                <div class="form-group">
                    <p>Room Image</p>
                    <input type="file" name="image" id="imageInput" accept="image/*" required>
                </div>
                <div class="form-group">
                    <p>Description</p>
                    <input type="text" placeholder="" name="description" required>
                </div>
                <div class="form-group">
                    <p>Rules</p>
                    <input type="text" placeholder="No Smoking" name="rules" required>
                </div>
                <div class="form-group">
                    <p>Available from</p>
                    <input type="date" name="availability_start" required>
                </div>
                <div class="form-group">
                    <p>to</p>
                    <input type="date" name="availability_end" required>
                </div>
            </div>

            <div class="form-row">
                <p>Features:</p>
                <div class="checkbox-group">
                    @foreach($features as $feature)
                    <label class="checkbox-label">
                        <input type="checkbox" name="features[]" value="{{ $feature->id }}">
                        {{ $feature->name }}
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="form-row forms-action">
                <button type="submit" class="btn">Register</button>
            </div>

            <div class="divider">Or</div>

            <a href="{{ route('home') }}" class="btn">Cancelar</a>
        </form>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/imagePreview.js') }}"></script>
@endpush
@endsection