@extends('layouts.base')

@section('title', 'Profile')

@section('content')
<div class="flex flex-col md:flex-row gap-4 p-4 mx-32 my-6">

    <div class="w-full md:w-1/3 lg:w-1/4 bg-white rounded-xl p-4 shadow">
        <div class="flex items-center mb-4">
            <div class="flex flex-col items-center w-20 mx-10">
                <img src="img/profile-image-default.jpg"
                    alt="Foto de perfil"
                    class="w-14 h-14 rounded-full object-cover border-2 border-gray-500">

                <p class="text-lg font-bold mt-2">Pessoa</p>
                <p class="text-gray-500 text-sm">Locador</p>
            </div>

            <div class="">
                <div><span class="font-bold">21</span> avaliações</div>
                <div><span class="font-bold">4,85 ★</span> estrelas</div>
                <div><span class="font-bold">2</span> anos hospedando</div>
            </div>
        </div>

        <hr class="my-3 text-gray-400">

        <div class="mb-4">
            <h3 class="font-semibold mb-2 text-sm">Informações confirmadas</h3>
            <ul class="list-none list-inside text-sm text-gray-600">
                <li> <i class="fa-solid fa-check text-green-500"></i> Identidade</li>
                <li> <i class="fa-solid fa-check text-green-500"></i> Endereço de Email</li>
                <li> <i class="fa-solid fa-check text-green-500"></i> Número de Telefone</li>
            </ul>
        </div>

        <hr class="my-3 text-gray-400">

        <div class="flex flex-col gap-2 mt-8">
            @auth
            @if (Auth::user()->type === 'landlord')
            <a href="{{ route('my-rooms') }}"
                class="w-full bg-sky-500 hover:bg-sky-600 transition 
                    text-center text-white px-6 py-2 rounded-lg">
                <i class="fa-solid fa-door-closed"></i> Rooms
            </a>
            <a href="{{ route('register-room') }}"
                class="w-full bg-sky-500 hover:bg-sky-600 transition 
                    text-center text-white px-6 py-2 rounded-lg">
                <i class="fa-solid fa-pen-to-square"></i> Register Room
            </a>
            @endif
            @endauth
            <a href="#"
                class="w-full bg-gray-500 hover:bg-gray-600 transition 
                    text-center text-white px-6 py-2 rounded-lg">
                <i class="fa-solid fa-pen-to-square"></i> Edit Profile
            </a>
            @auth
            <form action="{{ route('logout.submit') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="w-full bg-gray-500 hover:bg-gray-600 transition 
                    text-center text-white px-6 py-2 rounded-lg">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
            @endauth
        </div>
    </div>

    <div class="w-full md:w-2/3 lg:w-3/4 space-y-4">
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="font-bold text-lg mb-2">About</h2>
            <div class="text-sm text-gray-700 grid grid-cols-1 md:grid-cols-2 gap-y-2">
                <p class="font-semibold"> <i class="fa-solid fa-cross text-yellow-300"></i> Age: 00</p>
                <p class="font-semibold"> <i class="fa-solid fa-map-pin text-pink-600"></i> Live in: City - State, Brasil</p>
                <p class="font-semibold"> <i class="fa-solid fa-globe text-blue-400"></i> Language: Portuguese [PT-BR]</p>
                <p class="font-semibold"> <i class="fa-solid fa-phone text-red-500"></i> Phone Number: +55 (82) 9 1111-1111</p>
                @auth
                @if (Auth::user()->type === 'renter')
                <p class="font-semibold"> <i class="fa-solid fa-id-badge text-gray-700"></i> Matriculation: 1122334455</p>
                <p class="font-semibold"> <i class="fa-solid fa-university text-green-600"></i> College: CESMAC</p>
                <p class="font-semibold"> <i class="fa-solid fa-book text-green-600"></i> Course: Design</p>
                <p class="font-semibold"> <i class="fa-solid fa-calendar-alt text-yellow-600"></i> Period: 5°</p>
                @endif
                @endauth
                @auth
                @if (Auth::user()->type === 'landlord')
                <p class="font-semibold"> <i class="fa-solid fa-building-columns text-blue-500"></i> Bank Code: 001</p>
                <p class="font-semibold"> <i class="fa-solid fa-code-branch text-blue-500"></i> Branch: 1234-5</p>
                <p class="font-semibold"> <i class="fa-solid fa-id-card text-blue-500"></i> Bank Account Number: 12345678</p>
                <p class="font-semibold"> <i class="fa-solid fa-money-check text-blue-500"></i> Account Type: Checking</p>
                @endif
                @endauth
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            @auth
            @if (Auth::user()->type === 'landlord')
            <h2 class="font-bold text-lg mb-2">Reviews</h2>
            <div class="space-y-4">
                <div class="bg-gray-100 p-3 rounded-md">
                    <p class="italic">“Lugar super aconchegante!”</p>
                    <div class="text-sm text-gray-600 mt-1">👤 Maethe · November 2024</div>
                </div>
                <div class="bg-gray-100 p-3 rounded-md">
                    <p class="italic">“Ótimo local, recomendo de certeza”</p>
                    <div class="text-sm text-gray-600 mt-1">👤 Carlos · January 2024</div>
                </div>
            </div>
            @endif
            @if (Auth::user()->type === 'renter')
            <h2 class="font-bold text-lg mb-2">Your Reviews</h2>
            <div class="space-y-4">
                <div class="bg-gray-100 p-3 rounded-md">
                    <p class="italic">“Locador muito gente boa.”</p>
                    <div class="text-sm text-gray-600 mt-1">👤 Carlos · November 2024</div>
                </div>
                <div class="bg-gray-100 p-3 rounded-md">
                    <p class="italic">“Bem localizado e organizado.”</p>
                    <div class="text-sm text-gray-600 mt-1">👤 Carlos · January 2024</div>
                </div>
            </div>
            @endif
            @endauth
        </div>
    </div>
</div>
@endsection