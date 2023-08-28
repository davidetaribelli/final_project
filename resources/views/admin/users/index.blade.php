@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-2">
    <div class="row">
        <h1 class="p-0">Il tuo Super Profilo</h1>
        {{-- img. --}}
        <div class="col-6 p-0">
            <img class="rounded-start w-100 shadow bg-body" src="/storage/{{$user->img}}" alt={{$user->name}}>
        </div>

        {{-- dati personali. --}}
        <div class="col-6">
            <h4 class="p-2">Dati Personali</h4>

            <div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{  $user->name }}</li>
                    <li class="list-group-item">{{  $user->surname }}</li>
                    <li class="list-group-item">{{  $user->email }}</li>
                    <li class="list-group-item">{{  $user->phone }}</li>
                    <li class="list-group-item">{{  $user->cachet }} €</li>
                </ul>
            </div>
        </div>

        {{-- genere --}}
        <div class="col-12 mt-5 p-0">
            <h3>Generi Musicali:</h3>
            <ul>
                @foreach ($user->genres as $genre)
                  <li>{{$genre->name}}</li>  
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
        <div class="col-3 p-0">
            <button type="button" class="mt-4 btn btn-outline-dark">
                <a class="btn btn-light" href="{{route("admin.users.edit", $user->id)}}">Modifica il profilo</a>                       
            </button>
        </div>
       
    </div>
</div>

<div class="container-fluid mt-5">

   
</div>


@endsection