@extends('layouts.base')

@section('title', 'Register - Room')

@section('content')
<div class="text-center mt-12">
    <h1 class="text-3xl font-bold text-black">
        Register
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
            <div class="grid md:grid-cols-5 gap-4">
                <!-- Image Preview -->
                <div>
                    <p class="font-medium mb-1">Image Preview</p>
                    <div class="border rounded image-input-cardwrapper">
                        <img id="imagePreview" src="#" alt="Image preview"
                            class="hidden w-full rounded" />
                    </div>
                </div>

                <!-- Title -->
                <div>
                    <p class="font-medium mb-1">Title</p>
                    <input type="text" name="title" placeholder="Room in Fernandes Lima" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>

                <!-- Address -->
                <div>
                    <p class="font-medium mb-1">Address</p>
                    <input type="text" name="address" placeholder="Street Thillys Malta" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>

                <!-- Price -->
                <div>
                    <p class="font-medium mb-1">Price p/month [R$]</p>
                    <input type="number" name="monthly_price" placeholder="120.0" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>

                <!-- Course -->
                <div class="md:col-span-1">
                    <p class="font-medium mb-1">Course</p>
                    <select name="course_id" id="course_id" class="w-full border rounded px-3 py-2 text-sm" required>
                        <option disabled selected>Select Course</option>
                        @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Form Row 2 -->
            <div class="grid md:grid-cols-5 gap-4">
                <!-- Room Image -->
                <div>
                    <p class="font-medium mb-1">Room Image</p>
                    <label for="imageInput"
                        class="cursor-pointer bg-blue-600 hover:bg-blue-700 
                        text-white hover:text-gray-300 w-full py-2 rounded transition
                        flex justify-center items-center text-sm">
                        Choose Image
                    </label>
                    <input type="file" name="image" id="imageInput" accept="image/*" required
                        class="hidden" />
                </div>

                <!-- Description -->
                <div>
                    <p class="font-medium mb-1">Description</p>
                    <input type="text" name="description" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>

                <!-- Rules -->
                <div>
                    <p class="font-medium mb-1">Rules</p>
                    <input type="text" name="rules" placeholder="No Smoking" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>

                <!-- Availability -->
                <div>
                    <p class="font-medium mb-1">Available from</p>
                    <input type="date" name="availability_start" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>
                <div>
                    <p class="font-medium mb-1">to</p>
                    <input type="date" name="availability_end" required
                        class="w-full border rounded px-3 py-2 text-sm" />
                </div>
            </div>

            <!-- Features -->
            <div>
                <p class="font-medium mb-2">Features:</p>
                <div class="grid grid-cols-1 sm:grid-cols-5 md:grid-cols-3 gap-2">
                    @foreach($features as $feature)
                    <label class="checkbox-label">
                        <input type="checkbox" name="features[]" value="{{ $feature->id }}">
                        {{ $feature->name }}
                    </label>
                    @endforeach
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

                <a href="{{ route('profile') }}"
                    class="w-full bg-gray-600 hover:bg-gray-700 transition 
                    text-center text-white px-6 py-2 rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/imagePreview.js') }}"></script>
@endpush
@endsection