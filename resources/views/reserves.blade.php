@extends('layouts.base')

@section('title', 'Reserves')

@section('content')
<div class="text-center mt-12">
    <h1 class="text-3xl font-bold text-black">
        My Reserves
    </h1>
</div>

<div class="grid grid-cols-4 justify-items-center gap-4 p-4 my-12 mx-64">
    @forelse($reserves as $reserve)
    <div class="w-[260px] bg-white rounded-lg shadow overflow-hidden mb-4">
        @if ($reserve->room->image)
        <img class="w-[300px] h-48 object-cover" src="{{ asset('storage/' . $reserve->room->image) }}"
            alt="Room-Image">
        @endif
        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800">{{ $reserve->room->title }} 🇧🇷</h3>
            <p class=" text-gray-600 underline font-semibold mt-2 pb-4">From
                R${{ number_format($reserve->monthly_price, 2, ',', '.') }} /month</p>
            <div class="flex gap-2">
                <a href="#" class="bg-blue-400 hover:bg-blue-500 transition text-white 
                px-4 py-2 rounded">
                    See More
                </a>
                @if ($user->type === 'landlord')
                <a href="#" class="bg-blue-400 hover:bg-blue-500 transition text-white 
                px-4 py-2 rounded">
                    Edit Reserve
                </a>
                @endif
            </div>
        </div>
    </div>
    @empty
    <p>No reserves registered.</p>
    @endforelse
</div>
@endsection