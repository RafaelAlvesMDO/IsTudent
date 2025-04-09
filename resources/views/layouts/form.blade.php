<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('img/IsTudent-Brand.png') }}" type="IsTudent-Brand/svg">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forms-style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="@yield('body-class')">

    <header>
        <nav class="@yield('navbar-class')">
            <div class="container-fluid ms-3">
                <img src="{{ asset('img/IsTudent-Brand.png') }}" alt="IsTudent-Icon">
                <a class="navbar-brand" href="{{ url('/login') }}">IsStudent</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!--  Footer Padrão
    <footer class="bg-white text-black text-center py-0 mt-auto">
        <p class="fs-6">&copy; 2025 IsTudent. Todos os direitos reservados.</p>
    </footer>
    -->

</body>

</html>