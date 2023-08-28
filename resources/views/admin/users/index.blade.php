@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-2">
    <div class="row">
        {{-- dati personali. --}}

        <div class="mt-4 row g-0">
            <div class="col-sm-6 col-md-6">
                <h3>Esperienza e descrizione personale</h3>
                <div>{{  $user->experience }}</div>
            </div>
            <div class="col-6 col-md-6 d-flex flex-column align-items-center">
                    <h4 class="p-2">Voti</h4>
                    @foreach ($user->votes as $vote)
                    @php
                        $numeroStelle = $vote->vote;
                    @endphp
                    <div class="badge btnColor stelle fs-5 m-1 p-2">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $numeroStelle)
                            <i class="fa-solid fa-star" style="color: #e2ff05;"></i>
                            @else
                            <i class="fa-solid fa-star" style="color: #000000;"></i>
                            @endif
                        @endfor
                    </div>
                    @endforeach
            </div>
        </div>
        

        <div class="mt-5">
            <div class="row g-0 text-center">
                <div class="col-sm-6 col-md-6"></div>
                <div class="col-6 col-md-6">
                    <h3>Cachet</h3>
                    <div class="badge btnColor widthBadge fs-5 text-start">
                        {{$user->cachet}}€
                    </div>
                </div>
            </div>
        </div>

        {{-- esperienza. --}}
        <div class="col-6 mt-5 p-0">
            <div class="col-md-6 d-flex flex-column">
                <h4 class="p-2">Dati Personali</h4>
                <div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa-regular fa-user" style="color: #000000;"></i>  {{  $user->name }}</li>
                        <li class="list-group-item"><i class="fa-regular fa-user" style="color: #000000;"></i>  {{  $user->surname }}</li>
                        <li class="list-group-item"><i class="fa-regular fa-envelope" style="color: #000000;"></i>  {{  $user->email }}</li>
                        <li class="list-group-item"><i class="fa-solid fa-phone" style="color: #000000;"></i>  {{  $user->phone }}</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- genere --}}
        <div class="col-12 mt-5 p-0">
            <h3>Generi Musicali:</h3>
                @foreach ($user->genres as $genre)
                  <h1 class="list-unstyled text-white fs-5 text-decoration-none badge btnColor">{{$genre->name}}</h1>  
                @endforeach
            </ul>
        </div>

        {{-- esperienza. --}}
        <div class="col-12 mt-5 p-0">
            <h3>Esperienza e descrizione personale</h3>

            <div>
                {{  $user->experience }}
            </div>
        </div>

        {{-- bottone --}}
        {{-- <div class="col-3 p-0">
            <button type="button" class="mt-4 btn btn-outline-dark">
                <a class="btn btn-light" href="{{route("admin.users.edit", $user->id)}}">Modifica il profilo</a>                       
            </button>
        </div>
        --}}
    </div>
</div>

<div class="container-fluid mt-5">

   
</div>


@endsection