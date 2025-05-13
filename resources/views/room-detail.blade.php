@extends('layouts.base')

@section('title', 'Room Info')

@section('content')
<div class="max-w-6xl mx-auto my-8 bg-white rounded-2xl border border-r-2 border-gray-200 shadow-lg overflow-hidden flex flex-col md:flex-row h-[500px]">
    <!-- Imagem do Quarto -->
    <div class="md:w-1/2 w-full">
        <img src="{{ asset('storage/' . $room->image) }}" alt="Quarto" class="h-full w-full object-cover">
    </div>

    <!-- Informações -->
    <div class="md:w-1/2 w-full p-6 flex flex-col gap-2 overflow-y-auto">
        <h2 class="text-2xl font-bold text-gray-800">{{ $room->title }}</h2>
        <p class="text-gray-600"><strong>Localization:</strong> Maceió - AL</p>
        <p class="text-gray-600"><strong>Adress:</strong> {{ $room->address }}</p>
        <p class="text-gray-600">
            <strong>Disponibility:</strong> {{ $room->availability_start }} to {{ $room->availability_end }}
        </p>
        <p class="text-gray-600"><strong>Course:</strong> {{ $room->course->name }}</p>
        <p class="text-blue-400 font-semibold text-lg"><strong>R$ {{ $room->monthly_price }}/month</strong></p>

        <hr class="my-3 text-gray-400">

        <a href="{{ route('profile', $room->landlord->user->name) }}">
            <p class="text-gray-600 hover:text-gray-700"><strong>Landlord:</strong> {{ $room->landlord->user->name }}</p>
        </a>

        <!-- Botão do WhatsApp -->
        <div>
            <p class="text-gray-700 mb-1"><strong>Contact:</strong></p>
            <a href="https://wa.me/{{ $room->landlord->user->phone }}" target="_blank"
                class="inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition w-fit">
                Whatsapp <i class="fab fa-whatsapp text-white"></i>
            </a>
        </div>

        <hr class="my-3 text-gray-400">

        <div>
            <strong class="text-gray-700">Features:</strong>
            <div class="flex flex-wrap gap-2 mt-1">
                @forelse($room->features as $feature)
                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">{{ $feature->name }}</span>
                @empty
                <li>This room doesn't have any features.</li>
                @endforelse
            </div>
        </div>

        <div>
            <strong class="text-gray-700">Rules:</strong>
            <p class="text-gray-600 mt-1">
                {{ $room->rules }}.
            </p>
        </div>

        <div>
            <strong class="text-gray-700">Description:</strong>
            <p class="text-gray-600 mt-1">
                {{ $room->description }}.
            </p>
        </div>
    </div>
</div>
@endsection