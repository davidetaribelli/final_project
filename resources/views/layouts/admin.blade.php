
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
            <div class="row">
     
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 sidebar rounded-5 m-3 bg_navbar">
                    <div class="position-sticky pt-3">
                        <div class="nav flex-column">

                            
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <div class="containerImg mb-3">
                                    @if ($user->img === null)
                                        <img class="profile_img_nav mt-3 rounded-circle" src="/storage/placeholders/placeholder.jpg" alt={{$user->name}}>
                                    @else
                                        <img class="profile_img_nav mt-3 rounded-circle" src="/storage/{{$user->img}}" alt={{$user->name}}>
                                    @endif
                                </div>
                               <h4 class="text-dark mt-3">{{ $user->name }}</h4>
                               <div class="text-dark">{{$user->email}}</div>
                            </div> 

                            
                            <div class="nav-item  rounded-pill bg_cl_primary m-2">
                                <a class="nav-link text-dark text-center" href="/">
                                    {{-- <i class="fa-solid fa-home-alt fa-lg fa-fw text-dark"></i> Home --}}
                                    Home
                                </a>
                            </div>
                            
                        
                            <div class="nav-item  rounded-pill bg_cl_primary m-2">
                                <a class="nav-link text-dark text-center {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg_selected_button' : '' }}" href="{{route('admin.dashboard')}}">
                                    Dashboard
                                </a>
                            </div>
                            
                        
                            <div class="nav-item  rounded-pill bg_cl_primary m-2">
                                <a class="nav-link text-dark text-center {{ Route::currentRouteName() == 'admin.users.index' ? 'bg_selected_button' : '' }}" href="{{ route('admin.users.index') }}">
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
                <main class="col-9 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>