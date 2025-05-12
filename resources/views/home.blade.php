@extends('layouts.base')

@section('title', 'IsTudent')

@section('content')
<div class="text-center mt-24">
    <h1 class="text-3xl md:text-5xl font-bold text-gray-600">
        A
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-yellow-400">Brazilian</span>
        platform for
        <span class="text-blue-400">furnished rooms</span>
    </h1>
    <h3 class="text-xl font-semibold text-gray-400 mt-10">
        <i class="fa-solid fa-code"></i>
        CESMAC Project: developed for studies
    </h3>
</div>

<div class="grid grid-cols-4 justify-items-center gap-4 p-4 mx-64 my-12">
    @forelse($rooms as $room)
    <div class="max-w-sm bg-white rounded-lg shadow overflow-hidden mb-4">
        <img class="w-[300px] h-48 object-cover" src="{{ asset('storage/' . $room->image) }}"
            alt="Room-Image">
        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800">{{ $room->title }} 🇧🇷</h3>
            <p class="text-gray-600 underline font-semibold mt-2 pb-4">From
                R${{ number_format($room->monthly_price, 2, ',', '.') }} /month</p>
            <a class="mt-4 bg-blue-400 hover:bg-blue-500 transition
            text-white px-4 py-2 rounded" href="{{ route('room-info', ['title' => $room->title]) }}">
                Rent Room
            </a>
        </div>
    </div>
    @empty
    <p>No rooms registered.</p>
    @endforelse
</div>
@endsection