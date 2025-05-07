<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/IsTudent-Logo-White.png') }}" type="IsTudent-Brand/png">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>@yield('title')</title>
</head>

<body class="bg-white min-h-screen flex flex-col">
    <header>
        @include('layouts.header')
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer>
        @include('layouts.footer')
    </footer>

    @stack('scripts')
</body>

</html>