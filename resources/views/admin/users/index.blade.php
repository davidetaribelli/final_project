@extends('layouts.admin')

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        {{-- dati personali. --}}

        <div class="mt-4 row g-0">
            <div class="col-12 d-xl-flex">
                <div class="col-sm-12 col-xl-6">
                    <h3 class="text-white fw-bold">PRESENTAZIONE</h3>
                    <div class="my-4">{{  $user->experience }}</div>
                </div>
                
                <div class="col-sm-12 col-xl-6 d-flex">
                    <div class="col-sm-3 col-md-6 p-2">
                        <h3 class="text-white fw-bold">VOTI</h3>
                    @foreach ($user->votes as $vote)
                    @php
                        $numeroStelle = $vote->vote;
                    @endphp
                    <div class="badge btnColor stelle fs-5 my-4">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $numeroStelle)
                            <i class="fa-solid fa-star" style="color: #D9D9D9;"></i>
                            @else
                            <i class="fa-solid fa-star" style="color: #000000;"></i>
                            @endif
                        @endfor
                    </div>
                    @endforeach
                </div>
                <div class="col-sm-3 col-md-6 p-2">
                    <h3 class="text-white fw-bold">CACHET</h3>
                    <div class="badge btnColor fs-5 my-4 p-2">
                        {{$user->cachet}}€
                    </div>
                </div>
                </div>
            </div>
        </div>

        {{-- dati personali. --}}
        <div class="col-xl-12 mt-5 p-0">
            <div class="col-md-6 d-flex flex-column">
                <h3 class="text-white fw-bold">DATI PERSONALI</h3>
                <ul class="list-group list-group-flush rounded-4 my-4">
                    <li class="list-group-item px-3 border-0"><i class="fa-regular fa-user me-3" style="color: #000000;"></i>  {{  $user->name }}</li>
                    <li class="list-group-item px-3 border-0"><i class="fa-regular fa-user me-3" style="color: #000000;"></i>  {{  $user->surname }}</li>
                    <li class="list-group-item px-3 border-0"><i class="fa-regular fa-envelope me-3" style="color: #000000;"></i>  {{  $user->email }}</li>
                    <li class="list-group-item px-3 border-0"><i class="fa-solid fa-phone me-3" style="color: #000000;"></i>  {{  $user->phone }}</li>
                </ul>
            </div>
        </div>

        {{-- genere --}}
        <div class="col-12 mt-5 p-0 ">
            <h3 class="text-white fw-bold">GENERI MUSICALI:</h3>
                @foreach ($user->genres as $genre)
                  <span class="list-unstyled text-white fs-5 text-decoration-none badge btnColor my-4">{{$genre->name}}</span>  
                @endforeach
        </div>

        {{-- bottone --}} 
        <div class="col-12 d-flex justify-content-md-start justify-content-xl-center p-0 ">
            <button type="button" class="mt-4 btn btn-light btnColor border-0">
                <a class="text-decoration-none text-white fs-5 fw-bold" href="{{route("admin.users.edit", $user->id)}}">Modifica il profilo</a>                       
            </button>
        </div>
       
    </div>
</div>
@endsection