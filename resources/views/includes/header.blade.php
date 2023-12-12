<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meet&Fit</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="icon" href="{{ asset('img/logodeporte.png') }}" type="image/x-icon"/>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .dropdown-menu .dropdown-item:hover {
            background-color: #3AABD9;
            /* Cambia el color al pasar el cursor */
            color: white;
            /* Cambia el color del texto al pasar el cursor */
        }

        ul.dropdown-menu.dropdown-menu-end.show{
            background-color: #f8f9fa !important;
        }

        li {
            background-color: #f8f9fa;
        }
    </style>

</head>

<body>

    <header>
        @if (Auth::check())
            <nav class="nar_navbar navbar navbar-expand-lg bg-body-tertiary fixed-top">
                <div class="container-fluid">
                    <a href="index" id="cabecera-img" class="cabecera-img" href="index"><img
                            src="{{ 'img/logodeporte1.png' }}"></a>
                    <a class="restaurante navbar-brand">Meet & Fit</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false">
                                    {{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" id="todasactividades" aria-current="page"
                                            href="todasactividades">Todas las Actividades</a>
                                    </li>

                                    <li><a class="dropdown-item" id="misactividades" aria-current="page"
                                            href="misactividades">Mis Actividades</a>
                                    </li>
                                    <li><a class="dropdown-item" id="perfil" aria-current="page" href="perfil">Mi
                                            perfil</a>
                                    </li>
                                    <li><a class="dropdown-item" id="misparticipaciones" aria-current="page"
                                            href="actividades_usuario">Mis
                                            Participaciones</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit()"
                                            class=""><i class="fa"></i>Cerrar Sesión</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        @else
            <nav class="nar_navbar navbar navbar-expand-lg bg-body-tertiary fixed-top">
                <div class="container-fluid">
                    <a href="index" id="cabecera-img" class="cabecera-img"><img src="{{ 'img/logodeporte1.png' }}"></a>
                    <a class="navbar-brand">Meet & Fit</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" id="log" aria-current="page" href="login">Iniciar sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @endif
    </header>
