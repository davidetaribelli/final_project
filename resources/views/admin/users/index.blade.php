@extends('layouts.admin')

@section('content')

<div class="container p-3">
    <div class="row justify-content-center">
        {{-- dati personali. --}}
        <div class="col-12 d-xl-flex flex-wrap p-0">
            <div class="col-sm-12 col-xl-10">
                <h3 class="text-white fw-bold">PRESENTAZIONE</h3>
                <div class="my-4 text-white">{{  $user->experience }}</div>
            </div>

            {{-- dati personali. --}}
            <div class="col-md-8 d-flex flex-column p-0">
                <h3 class="text-white fw-bold">DATI PERSONALI</h3>
                <ul class="list-group list-group-flush rounded-4 my-4">
                    <li class="list-group-item px-3 border-0"><i class="fa-regular fa-user me-3" style="color: #000000;"></i>  {{  $user->name }}</li>
                    <li class="list-group-item px-3 border-0"><i class="fa-regular fa-user me-3" style="color: #000000;"></i>  {{  $user->surname }}</li>
                    <li class="list-group-item px-3 border-0"><i class="fa-regular fa-envelope me-3" style="color: #000000;"></i>  {{  $user->email }}</li>
                    <li class="list-group-item px-3 border-0"><i class="fa-solid fa-phone me-3" style="color: #000000;"></i>  {{  $user->phone }}</li>
                </ul>
            </div>
            
            {{-- media voti --}}
            <div class="col-12 d-flex flex-wrap">
                <div class="col-sm-7 col-xl-4 p-2">
                    <h3 class="text-white fw-bold">MEDIA VOTI</h3>
                    @php
                        $averageVote = $user->votes->avg('vote');
                        $averageStars = round($averageVote); // Arrotonda alla stella più vicina
                    @endphp
                    <div class="badge btnColor fs-5 my-4 p-2">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $averageStars)
                                <i class="fa-solid fa-star" style="color: gold;"></i>
                            @else
                                <i class="fa-solid fa-star" style="color: #000000;"></i>
                            @endif
                        @endfor
                    </div>
                </div>

                {{-- prezzo --}}
                <div class="col-sm-3 col-xl-2 p-2">
                    <h3 class="text-white fw-bold">CACHET</h3>
                    <div class="badge btnColor fs-5 my-4 p-2">
                        {{$user->cachet}}€
                    </div>
                </div>

                {{-- genere --}}
                <div class="col-sm-3 col-md-7 p-2">
                    <h3 class="text-white fw-bold">GENERI MUSICALI:</h3>
                    @foreach ($user->genres as $genre)
                        <span class="list-unstyled text-white fs-5 text-decoration-none badge btnColor my-4">{{$genre->name}}</span>  
                    @endforeach
                </div>
            </div>
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