@extends('layouts.admin')

@section('content')

<h2>Crea Il tuo profilo</h2>

<form action="{{route('admin.users.store')}}" method="POST">
@csrf

        {{-- Nome --}}
        <div class="mb-3">
            <label for="name" class="form-label">Inserisci Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" value="{{old("name")}}">

            @error("name")
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- Cognome --}}
        <div class="mb-3">
            <label for="surname" class="form-label">Inserisci Cognome</label>
            {{-- <textarea class="form-control  @error('description') is-invalid @enderror" id="description" rows="3" name="description" value="{{old("description")}}">
            </textarea> --}}
            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" aria-describedby="emailHelp" value="{{old("surname")}}">

            @error("surname")
                    <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">

            <label for="type_id">email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{old("email")}}">
           
            @error("email")
            <div class="invalid-feedback">{{$message}}</div>
            @enderror

        </div>

        {{-- immagine --}}
        <div class="mb-3">
            <label for="img" class="form-label">Inserisci immagine</label>
            <input type="file" class="form-control @error('img') is-invalid @enderror " id="img" name="img" aria-describedby="emailHelp">

            @error("img")
                <div class="invalid-feedback">{{$message}}</div>
             @enderror
        </div>

         {{-- Regione --}}
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example">
                <option selected>Seleziona la regione di appartenenza</option>
                <option value="1">Abruzzo</option>
                <option value="2">Basilicata</option>
                <option value="3">Calabria</option>
                <option value="4">Campania</option>
                <option value="5">Emilia-Romagna</option>
                <option value="6">Friuli Venezia Giulia</option>
                <option value="7">Lazio</option>
                <option value="8">Liguria</option>
                <option value="9">Lombardia</option>
                <option value="10">Marche</option>
                <option value="11">Molise</option>
                <option value="12">Piemonte</option>
                <option value="13">Puglia</option>
                <option value="14">Sardegna</option>
                <option value="15">Toscana</option>
                <option value="16">Trentino Alto Adige</option>
                <option value="17"> Umbria</option>
                <option value="18">Val d'Aosta</option>
                <option value="19">Veneto</option>

              </select>

            @error("region")
                <div class="invalid-feedback">{{$message}}</div>
             @enderror
        </div>

        {{-- Telefono --}}
        <div class="mb-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="phone">+39</span>
                <input type="number" class="form-control" placeholder="phone" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            @error("phone")
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- Telefono --}}
        <div class="mb-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="cachet">€</span>
                <input type="number" class="form-control" placeholder="cachet" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        
            @error("phone")
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- Esperienza --}}
        <div class="mb-3">
            <label for="experience" class="form-label">Inserisci la tua presentazione / esperienza</label>
            <textarea class="form-control  @error('experience') is-invalid @enderror" id="experience" rows="3" name="experience" value="{{old("experience")}}"></textarea>
           

            @error("surname")
                    <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        



        <button type="submit" class="btn btn-primary">Submit</button>



</form>



@endsection