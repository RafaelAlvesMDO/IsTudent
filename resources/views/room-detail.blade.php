@extends('layouts.base')

@section('title', 'Room Info')

@section('content')
<div class="max-w-6xl mx-auto my-8 bg-white rounded-2xl border border-r-2 border-gray-200 shadow-lg overflow-hidden flex flex-col md:flex-row h-[500px]">
    <!-- Imagem do Quarto -->
    <div class="md:w-1/2 w-full">
        <img src="img/BrooklynHeights-Room-Image.jpg" alt="Quarto" class="h-full w-full object-cover">
    </div>

    <!-- Informações -->
    <div class="md:w-1/2 w-full p-6 flex flex-col gap-2 overflow-y-auto">
        <h2 class="text-2xl font-bold text-gray-800">Room Title</h2>
        <p class="text-gray-600"><strong>Localization:</strong> Maceió - AL</p>
        <p class="text-gray-600"><strong>Adress:</strong> Street Paulo Gusmão</p>
        <p class="text-gray-600">
            <strong>Disponibility:</strong> 01/06/2025 até 31/12/2025
        </p>
        <p class="text-gray-600"><strong>Course:</strong> Engenharia Civil</p>
        <p class="text-green-600 font-semibold text-lg"><strong>R$ 850/month</strong></p>

        <hr class="my-3 text-gray-400">

        <a href="#">
            <p class="text-gray-600 hover:text-gray-700"><strong>Landlord:</strong> João Silva</p>
        </a>

        <!-- Botão do WhatsApp -->
        <div>
            <p class="text-gray-700 mb-1"><strong>Contact:</strong></p>
            <a href="https://wa.me/5599999999999" target="_blank"
                class="inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition w-fit">
                Whatsapp <i class="fab fa-whatsapp text-white"></i>
            </a>
        </div>

        <hr class="my-3 text-gray-400">

        <div>
            <strong class="text-gray-700">Features:</strong>
            <div class="flex flex-wrap gap-2 mt-1">
                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Ar-condicionado</span>
                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Cama de casal</span>
                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Wi-Fi incluso</span>
                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Escrivaninha</span>
            </div>
        </div>

        <div>
            <strong class="text-gray-700">Rules:</strong>
            <p class="text-gray-600 mt-1">
                Não fumar. Sem animais de estimação. Horário de silêncio após 22h.
            </p>
        </div>

        <div>
            <strong class="text-gray-700">Description:</strong>
            <p class="text-gray-600 mt-1">
                Quarto arejado e bem iluminado, ideal para estudantes. Próximo à universidade e com ponto de ônibus na frente.
            </p>
        </div>
    </div>
</div>
@endsection