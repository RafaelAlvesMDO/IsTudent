@extends('layouts.base')

@section('title', 'Reserve - Room')

@section('content')
<div class="text-center mt-12">
    <h1 class="text-3xl font-bold text-black">
        Reserve
    </h1>
</div>

<div class="flex justify-center items-center my-4 bg-white p-6">
    <div class="w-full max-w-5xl bg-white rounded-lg shadow-lg p-8 border border-gray-300">

        <form method="POST" action="#" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Errors -->
            <div class="">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                    <li class="bg-red-100 text-red-700 px-4 py-3 rounded">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Form Row 1 -->
            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <p class="font-medium mb-1">Name</p>
                    <input type="text" name="name" placeholder="João Pedro" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>

                <div>
                    <p class="font-medium mb-1">CPF</p>
                    <input type="text" name="cpf" placeholder="11122233344" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>

                <div>
                    <p class="font-medium mb-1">Matriculation</p>
                    <input type="text" name="matriculation" placeholder="1122334455" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>
            </div>

            <div class="grid md:grid-cols-4 gap-4">
                <div>
                    <p class="font-medium mb-1">Renter Email</p>
                    <input type="email" name="email" placeholder="renteremail@gmail.com" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>

                <div>
                    <p class="font-medium mb-1">Renter Phone Number</p>
                    <input type="tel" name="phone" placeholder="5582911112222" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>

                <div>
                    <p class="font-medium mb-1">Renter's Quantity</p>
                    <input type="number" name="renter_quantity" placeholder="1" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>

                <div class="md:col-span-1">
                    <p class="font-medium mb-1">Room</p>
                    <select name="room_id" id="room_id" class="w-full border rounded px-3 py-2 text-sm" required>
                        <option disabled selected>Select which Room</option>
                        @foreach($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-4 gap-4">
                <div>
                    <p class="font-medium mb-1">Check-in</p>
                    <input type="date" name="check_in_date" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>

                <div>
                    <p class="font-medium mb-1">Check-out</p>
                    <input type="date" name="check_out_date" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>

                <div>
                    <p class="font-medium mb-1">Price p/month [R$]</p>
                    <input type="number" name="monthly_price" placeholder="120.0" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>

                <div>
                    <p class="font-medium mb-2">Payment Form</p>
                    <div class="grid grid-cols-1 sm:grid-cols-5 md:grid-cols-1 gap-2">
                        <select name="payment_form" class="w-full border rounded px-3 py-2 text-sm" required>
                            <option disabled selected>Select Payment Form</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Debit Card">Debit Card</option>
                            <option value="Bank Slip">Bank Slip</option>
                            <option value="PIX">PIX</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Submit + Cancel -->
            <div class="flex flex-col items-center gap-2 mt-6 forms-action">
                <button type="submit"
                    class="w-full bg-blue-400 hover:bg-blue-500 transition 
                    text-center text-white px-6 py-2 rounded">
                    Submit
                </button>

                <div class="flex items-center gap-4 w-full">
                    <hr class="flex-grow border-t border-gray-400" />
                    <span class="text-gray-400 whitespace-nowrap">OR</span>
                    <hr class="flex-grow border-t border-gray-400" />
                </div>

                <a href="{{ route('profile', ['id' => auth()->user()->id]) }}"
                    class="w-full bg-gray-600 hover:bg-gray-700 transition 
                    text-center text-white px-6 py-2 rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection