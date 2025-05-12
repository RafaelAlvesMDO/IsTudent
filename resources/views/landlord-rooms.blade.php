@extends('layouts.base')

@section('title', 'IsTudent')

@section('content')
<div class="text-center mt-12">
    <h1 class="text-3xl font-bold text-black">
        My Rooms
    </h1>
</div>

<div class="grid grid-cols-4 justify-items-center gap-4 p-4 my-12 mx-64">
    @forelse($rooms as $room)
    <div class="max-w-sm bg-white rounded-lg shadow overflow-hidden mb-4">
        <img class="w-[300px] h-48 object-cover" src="{{ asset('storage/' . $room->image) }}"
            alt="Room-Image">
        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800">{{ $room->title }} 🇧🇷</h3>
            <p class=" text-gray-600 underline font-semibold mt-2 pb-4">From
                R${{ number_format($room->monthly_price, 2, ',', '.') }} /month</p>
            <a href="" class="mt-4 bg-blue-400 hover:bg-blue-500 transition text-white px-4 py-2 rounded">
                Edit Room
            </a>
        </div>
    </div>
    @empty
    <p>No rooms registered.</p>
    @endforelse
</div>
@endsection