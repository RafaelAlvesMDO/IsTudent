@extends('layouts.base')

@section('title', 'Rooms')

@section('content')
<div class="container mt-5">
    <div class="row">
        @foreach($rooms as $id => $informations)
        <div class="col-md-4">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <img src="{{ asset($informations['Image']) }}" class="card-img img-fluid" alt="Category Image" style="height: 200px; object-fit: cover;" alt="Category Image">
                    <h5 class="card-title mt-2 fs-6">{{ $informations['Name'] }}</h5>
                    <p class="card-text fs-5 fw-bold text-decoration-underline">From ${{ $informations['Price'] }} /night</p>
                    <a href="{{ url('rooms/' . ($informations['Name'])) }}" class="btn btn-primary">
                        Rent Room</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection