<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('img/IsTudent-Brand.png') }}" type="IsTudent-Brand/svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    <header>
        <nav class="navbar bg-primary navbar-expand-lg rounded-5 rounded-top-0">
            <div class="container-fluid ms-3">
                <img src="{{ asset('img/IsTudent-Brand.png') }}" alt="Brand-Icon">
                <a class="navbar-brand" href="#">IsStudent</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item border border-2 border-black rounded-pill ps-1 pe-1">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                        <li class="nav-item border border-2 border-black rounded-pill ps-1 pe-1 ms-2 me-3">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-0 mt-auto">
        <p class="fs-6">&copy; 2025 IsTudent. Todos os direitos reservados.</p>
    </footer>

</body>

</html>