<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title', 'DeliveBoo')
    </title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <header class="navbar bg-white navbar-dark sticky-top  flex-md-nowrap p-2 shadow">
            <div class="d-flex align-items-center">
                <div id="btn btn-primary">
                    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3">

                        <img src="{{ asset('img/chef-restaurant-logo.png') }}" alt="" style="width:100px ">
                    </a>

                </div>
                <button class="navbar-toggler bg_color d-md-none collapsed h-50" type="button"
                    data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <button class="btn btn-warning">
                <a class="text-white text-decoration-none" href="/profile">
                    <i class="fa-regular fa-circle-user"></i> {{ Auth::user()->name }}
                </a>
            </button>

            <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <button class="btn btn-warning text-white"
                onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                Logout
            </button>

        </header>

        <div class="container-fluid vh-100">
            <div class="row h-100">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  navbar-dark sidebar collapse">
                    <div class="position-sticky pt-4">
                        <ul class="nav flex-column">
                            <li class="nav-item">

                                <a style="padding-left: 12px"
                                    class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg_select' : '' }} {{ Route::currentRouteName() == 'admin.restaurants.index' ? 'bg_select' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <div class="d-flex gap-1 align-items-center text-uppercase">
                                        <i class="fs-4 fa-solid fa-tachometer-alt fa-lg fa-fw"></i>
                                        I tuoi ristoranti
                                    </div>
                                </a>

                            </li>


                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>
