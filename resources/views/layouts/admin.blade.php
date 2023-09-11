
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="container-fluid bg_primary min-vh-100">
            <div class="row justify-content-center p-5">

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

                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-3 fw-bold" href="{{route('admin.show.form')}}">
                                            Sponsor
                                        </a>
                                    </li>
        
                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-3 fw-bold" href="{{route('admin.user.message')}}">
                                            Messaggi
                                        </a>
                                    </li>
        
                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-3 fw-bold" href="{{route('admin.user.review')}}">
                                            Recensioni e voti
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-3 fw-bold" href="{{route('admin.user.stats')}}">
                                            Statistiche
                                        </a>
                                    </li>
                                </ul>
                             </div>
                        </div>
                    </div>
                </nav>

                {{-- BARRA PER LG --}}
                <div class="container">
                    <div class="row justify-content-between align-items-stretch">
                        <nav id="sidebarMenu" class="col-12 d-none d-xl-block p-0 mb-5">
                            <div class="position-sticky bg_navbar rounded-2">
                                <div class="nav d-flex justify-content-evenly">
                                    <div class="nav-item m-2">
                                        <a class="nav-link text-white text-center" href="http://localhost:5174/">
                                            Home
                                        </a>
                                    </div>
                                    
                                    <div class="nav-item m-2">
                                        <a class="nav-link text-white text-center {{ Route::currentRouteName() == 'admin.dashboard' ? 'nav-item ' : '' }}" href="{{route('admin.dashboard')}}">
                                            Dashboard
                                        </a>
                                    </div>
                                    
                                    <div class="nav-item m-2">
                                        <a class="nav-link text-white text-center {{ Route::currentRouteName() == 'admin.users.index' ? 'nav-item ' : '' }}" href="{{ route('admin.users.index') }}">
                                            Profilo
                                        </a>
                                    </div>
        
                                    <div class="nav-item m-2">
                                        <a class="nav-link text-white text-center" href="{{route('admin.show.form')}}">
                                            Sponsor
                                        </a>
                                    </div>
        
                                    <div class="nav-item m-2">
                                        <a class="nav-link text-white text-center {{ Route::currentRouteName() == 'admin.user.message' ? 'nav-item ' : '' }}" href="{{route('admin.user.message')}}">
                                            Messaggi
                                        </a>
                                    </div>
        
                                    <div class="nav-item m-2">
                                        <a class="nav-link text-white text-center {{ Route::currentRouteName() == 'admin.user.review' ? 'nav-item ' : '' }}" href="{{route('admin.user.review')}}">
                                            Recensioni e voti
                                        </a>
                                    </div>
        
                                    <div class="nav-item m-2">
                                        <a class="nav-link text-white text-center {{ Route::currentRouteName() == 'admin.user.stats' ? 'nav-item ' : '' }}" href="{{route('admin.user.stats')}}">
                                            Statistiche
                                        </a>
                                    </div>
                                    
                                    <div class="nav-item m-2">
                                        <a class="nav-link text-white text-center" href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa-solid fa-sign-out-alt fa-lg fa-fw"></i> {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
        
                                </div>
                            </div>
                        </nav>
                        <div class="col-md-4 col-xl-3 bg_navbar align-self-baseline rounded-2 p-3">
                            <div class="d-flex flex-wrap justify-content-center align-items-center">
                                <div class="mb-3 d-flex justify-content-center p-2">
                                        @if ($user->img === null)
                                            <img class="profile_img_nav mt-3 rounded-circle w-100" src="/storage/placeholders/placeholder.jpg" alt={{$user->name}}>
                                        @else
                                            <img class="profile_img_nav mt-3 rounded-circle w-100" src="/storage/{{$user->img}}" alt={{$user->name}}>
                                        @endif
                                </div>
                                <div class="col-12 d-flex justify-content-center flex-wrap">
                                    <h2 class="text-white mt-3">{{ $user->name }}</h2>
                                    <h5 class="text-white">{{$user->email}}</h5>
                                </div>
                            </div> 
                        </div>
                        <main class="col-md-7 col-xl-8 d-flex align-items-center justify-content-end bg_navbar p-3 rounded-2">
                            @yield('content')
                        </main>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>