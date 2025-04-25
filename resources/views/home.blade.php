@extends('layouts.base')

@section('title', 'IsTudent')

@section('content')
<div class="container mt-5">
    <div class="row">
        @forelse($rooms as $room)
        <div class="col-md-4">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <img src="{{ asset('storage/' . $room->image) }}" class="card-img img-fluid"
                        alt="Room Image" style="height: 200px; object-fit: cover;">
                    <h5 class="card-title mt-2 fs-6">{{ $room->title }}</h5>
                    <p class="card-text fs-5 fw-bold text-decoration-underline">From
                        ${{ number_format($room->monthly_price, 2, ',', '.') }} /month</p>
                    <a href="#" class="btn btn-primary">
                        Rent Room</a>
                </div>
            </div>
        </div>
        @empty
        <p>No rooms registered.</p>
        @endforelse
    </div>
</div>
@endsection