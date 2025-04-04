@extends('template')

@section('title', 'Room Informations')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <img src="{{ asset($room['Image']) }}" class="card-img img-fluid" alt="Category Image" style="height: 400px; object-fit: cover;" alt="Category Image">
                    <h5 class="card-title mt-2 fs-3 fw-bold">{{ $room['Name'] }}</h5>
                    <p class="card-text fs-5">{{ $room['Description'] }}</p>
                    <p class="card-text fs-5 fw-bold text-decoration-underline">From ${{ $room['Price'] }} /night</p>
                    <a href="#" class="btn btn-primary ps-2 pe-2">Rent Room</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection