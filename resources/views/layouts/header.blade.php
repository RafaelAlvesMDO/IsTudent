<!-- Base Navbar -->
<nav class="fixed top-0 w-full z-50 rounded-b-lg flex items-end justify-between px-6 pb-1.5 bg-white text-gray-600">
    <div class="flex gap-2 items-end">
        <img src="{{ asset('img/IsTudent-Logo-Blue.png') }}" alt="IsTudent-Icon">
        <a class="text-2xl font-semibold">IsTudent</a>
    </div>

    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 flex items-center gap-6">
        <a href="{{ route('home') }}" class="group inline-flex items-center gap-2 text-gray-600 hover:text-gray-700">
            <span class="inline-flex items-center gap-2 border-b-2 border-transparent 
            group-hover:border-gray-700 pb-0.5">
                <i class="fa-solid fa-door-open"></i> Rooms
            </span>
        </a>
        <a href="#" class="group inline-flex items-center gap-2 text-gray-600 hover:text-gray-700">
            <span class="inline-flex items-center gap-2 border-b-2 border-transparent group-hover:border-gray-700 pb-0.5">
                <i class="fa-solid fa-circle-info"></i> About
            </span>
        </a>
    </div>

    <div class="absolute bottom-0 right-4 flex items-end gap-6">
        @guest
        <a href="{{ route('login') }}" class="group inline-flex items-center gap-2 text-gray-600 hover:text-gray-700">
            <span class="inline-flex items-center gap-2 border-b-2 border-transparent 
            group-hover:border-gray-700 pb-0.5">
                <i class="fa-solid fa-user"></i> Login
            </span>
        </a>
        <a href="{{ route('register') }}" class="group inline-flex items-center gap-2 text-gray-600 hover:text-gray-700">
            <span class="inline-flex items-center gap-2 border-b-2 border-transparent 
            group-hover:border-gray-700 pb-0.5">
                <i class="fa-solid fa-user-plus"></i> Register
            </span>
        </a>
        @endguest

        @auth
        <a href="{{ route('profile', auth()->user()->name) }}" class="group inline-flex items-center gap-2 pb-1">
            <img src="{{ asset('storage/profiles-img/profile-image-default.jpg') }}" alt="profile_image"
                class="w-9 h-9 rounded-full border-2 border-gray-700 hover:border-gray-700 transition duration-200">
        </a>
        @endauth
    </div>
</nav>

<div class="pt-[36px]"></div>