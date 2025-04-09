<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('img/IsTudent-Brand.png') }}" type="IsTudent-Brand/png">
    <link rel="stylesheet" href="{{ asset('css/base-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    <header>
        <nav class="navbar bg-primary navbar-expand-lg fixed-top custom-navbar">
            <div class="container-fluid">
                <div class="d-flex align-items-center ms-3">
                    <img src="{{ asset('img/IsTudent-Brand.png') }}" alt="IsTudent-Icon" class="me-2">
                    <a class="navbar-brand mb-0 h1" href="{{ route('home') }}">IsStudent</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="navbar-btn" href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="nav-item ms-2 me-3">
                            <a class="navbar-btn" href="{{ url('/register') }}">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="navbar-placeholder" class="navbar-spacer"></div>
    </header>

    <main class="container mt-4">
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-2 mt-auto">
        <small>&copy; 2025 IsTudent. Todos os direitos reservados.</small>
    </footer>

</body>

</html>