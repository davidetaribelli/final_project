
<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    $user = Auth::user();        
@endphp
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="container-fluid bg_primary min-vh-100">
            <div class="row justify-content-around">

                {{-- BARRA PER MD E SM --}}
                <nav class="navbar btnColor d-lg-none">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-end w-100 bg_cl_primary" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-3 fw-bold" href="http://localhost:5174/">
                                            Home
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-3 fw-bold" href="{{route('admin.dashboard')}}">
                                            Dashboard
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-3 fw-bold" href="{{ route('admin.users.index') }}">
                                            Profilo
                                        </a>
                                    </li>
                                </ul>
                             </div>
                        </div>
                    </div>
                </nav>

                {{-- BARRA PER LG --}}
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 sidebar rounded-5 bg_navbar d-none d-xl-block mt-3">
                    <div class="position-sticky pt-3">
                        <div class="nav flex-column">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <div class="mb-3 d-flex justify-content-center">
                                    @if ($user->img === null)
                                        <div class="containerImg d-none d-xl-block">
                                            <img class="profile_img_nav mt-3 rounded-circle w-100" src="/storage/placeholders/placeholder.jpg" alt={{$user->name}}>
                                        </div>
                                    @else
                                    <div class="containerImg d-none d-xl-block">
                                        <img class="profile_img_nav mt-3 rounded-circle w-100" src="/storage/{{$user->img}}" alt={{$user->name}}>
                                    </div>
                                    @endif
                                </div>
                               <h4 class="text-dark mt-5">{{ $user->name }}</h4>
                               <div class="text-dark">{{$user->email}}</div>
                            </div>
                            
                            <div class="nav-item  rounded-pill bg_cl_primary m-2">
                                <a class="nav-link text-dark text-center" href="/">
                                    Home
                                </a>
                            </div>
                            
                            <div class="nav-item  rounded-pill bg_cl_primary m-2">
                                <a class="nav-link text-dark text-center {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg_selected_button nav-item  rounded-pill' : '' }}" href="{{route('admin.dashboard')}}">
                                    Dashboard
                                </a>
                            </div>
                            
                            <div class="nav-item  rounded-pill bg_cl_primary m-2">
                                <a class="nav-link text-dark text-center {{ Route::currentRouteName() == 'admin.users.index' ? 'bg_selected_button nav-item  rounded-pill' : '' }}" href="{{ route('admin.users.index') }}">
                                    Profilo
                                </a>
                            </div>

                            <div class="nav-item  rounded-pill bg_cl_primary m-2">
                                <a class="nav-link text-dark text-center" href="{{route('admin.dashboard')}}">
                                    Sponsor
                                </a>
                            </div>

                            <div class="nav-item  rounded-pill bg_cl_primary m-2">
                                <a class="nav-link text-dark text-center" href="{{route('admin.dashboard')}}">
                                    Messaggi
                                </a>
                            </div>

                            <div class="nav-item  rounded-pill bg_cl_primary m-2">
                                <a class="nav-link text-dark text-center" href="{{route('admin.dashboard')}}">
                                    Voti
                                </a>
                            </div>
                            
                            <div class="nav-item  rounded-pill bg_cl_primary m-2">
                                <a class="nav-link text-dark text-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-sign-out-alt fa-lg fa-fw"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </div>

                    </div>
                </nav>
                <main class="col-md-9 col-lg-9 p-5 m-3 bg_secondary rounded-5">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>