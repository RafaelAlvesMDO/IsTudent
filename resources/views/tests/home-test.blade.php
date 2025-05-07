@extends('layouts.base-test')

@section('title', 'IsTudent')

@section('content')
<div class="grid grid-cols-4 justify-items-center gap-2 p-4 mx-8">
    <div class="max-w-sm bg-white rounded-lg shadow overflow-hidden mb-4">
        <img class="w-full h-48 object-cover" src="{{ asset('img/BrooklynHeights-Room-Image.jpg') }}"
            alt="Room-Image">
        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800">Room Title</h3>
            <p class="text-gray-600 underline font-semibold mt-2 pb-4">From $200 /month</p>
            <a class="mt-4 bg-blue-600 text-white hover:text-gray-300 px-4 py-2 rounded hover:bg-blue-700" href="#">
                Rent Room
            </a>
        </div>
    </div>
    <div class="max-w-sm bg-white rounded-lg shadow overflow-hidden mb-4">
        <img class="w-full h-48 object-cover" src="{{ asset('img/Register-Renter-Bg-Image.jpg') }}"
            alt="Room-Image">
        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800">Room Title</h3>
            <p class="text-gray-600 underline font-semibold mt-2 pb-4">From $200 /month</p>
            <a class="mt-4 bg-blue-600 text-white hover:text-gray-300 px-4 py-2 rounded hover:bg-blue-700" href="#">
                Rent Room
            </a>
        </div>
    </div>
</div>
@endsection