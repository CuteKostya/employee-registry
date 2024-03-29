<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>@yield('title')</title>
</head>

<body>
<header class="pt-3">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Fixed navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('employees')}}">Table</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('employees.create')}}">Create</a>
                    </li>
                </ul>
            </div>
        </div>
        <form class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('login')}}">Вход </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('register')}}">Регистрация</a>
                </li>
            </ul>
        </form>
    </nav>

</header>
<main class="flex-shrink-0 pt-5 container">
    @yield('main_content')
</main>
</body>

</html>
