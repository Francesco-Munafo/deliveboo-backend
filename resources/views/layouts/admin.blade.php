<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title', 'dashboard')
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
            {{-- <input class="form-control form-control-dark w-100 ms-5" type="text"
                placeholder="Cerca il tuo progetto..." aria-label="Search"> --}}

            <div class="navbar-nav">
                {{--       <div class="nav-item text-nowrap ms-2">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <button class="btn btn-primary">


                            <div class="text">Logout</div>
                        </button>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div> --}}
                <div class="dropdown-center list-unstyled bg_color p-2 px-3 rounded">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white text-uppercase  mx-sm-3"
                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end  bg_color position-absolute"
                        aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-white"
                            href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a>
                        <a class="dropdown-item text-white" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                        <a class="dropdown-item text-white" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                {{--    <ul>
                    <li class="nav-item dropdown list-unstyled bg_color p-2 px-3 rounded">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white text-uppercase "
                            href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right bg_color" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                            <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul> --}}

            </div>
        </header>

        <div class="container-fluid vh-100">
            <div class="row h-100">
                <!-- Definire solo parte del menu di navigazione inizialmente per poi
        aggiungere i link necessari giorno per giorno
        -->
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

                            {{--  <li class="nav-item">

                                <a style="padding-left: 12px"
                                    class="nav-link text-white {{ Route::currentRouteName() == 'profile.edit' ? 'bg_select' : '' }}"
                                    href="{{ route('profile.edit') }}">
                                    <div class="d-flex gap-1 align-items-center">
                                        <i class="fs-4 fa-solid fa-user fa-lg fa-fw"></i>
                                        Profilo
                                    </div>
                                </a>

                            </li> --}}

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
