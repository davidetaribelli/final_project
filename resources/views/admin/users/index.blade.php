@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-2">
    <div class="row">
        {{-- dati personali. --}}

        <div class="mt-4 row g-0">
            <div class="col-sm-6 col-md-6">
                <h3 class="text-white fw-bold">PRESENTAZIONE</h3>
                <div class="my-4">{{  $user->experience }}</div>
            </div>
            <div class="col-6 col-md-6 d-flex flex-column align-items-center">
                    <h3 class="text-white fw-bold">VOTI</h3>
                    @foreach ($user->votes as $vote)
                    @php
                        $numeroStelle = $vote->vote;
                    @endphp
                    <div class="badge btnColor stelle fs-5 my-4 p-2">
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
        </div>
        

        <div class="my-4">
            <div class="row text-center">
                <div class="col-sm-6 col-md-6"></div>
                <div class="col-6 col-md-6">
                    <h3 class="text-white fw-bold">CACHET</h3>
                    <div class="badge btnColor widthBadge fs-5 text-start my-4">
                        {{$user->cachet}}€
                    </div>
                </div>
            </div>
        </div>

        {{-- dati personali. --}}
        <div class="col-6 mt-5 p-0">
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
        <div class="col-10 d-flex justify-content-end p-0 ">
            <button type="button" class="mt-4 btn btn-light btnColor border-0">
                <a class="text-decoration-none text-white fs-5 fw-bold" href="{{route("admin.users.edit", $user->id)}}">Modifica il profilo</a>                       
            </button>
        </div>
       
    </div>
</div>
@endsection