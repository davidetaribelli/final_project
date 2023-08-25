@extends('layouts.admin')

@section('content')

<h2>Crea Il tuo profilo</h2>

<form action="{{route('admin.users.store')}}" method="POST">
@csrf

        {{-- Nome --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" placeholder="Inserisci nome" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" value="{{ old("name") ?? $user->name}}">

            @error("name")
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- Cognome --}}
        <div class="mb-3">
            <label for="surname" class="form-label">Cognome</label>
            {{-- <textarea class="form-control  @error('description') is-invalid @enderror" id="description" rows="3" name="description" value="{{old("description")}}">
            </textarea> --}}
            <input type="text" placeholder="Inserisci cognome" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" aria-describedby="emailHelp" value="{{ old("surname") ?? $user->surname}}">

            @error("surname")
                    <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">

            <label for="type_id">Email</label>
            <input type="email" placeholder="Inserici email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{ old("email") ?? $user->email}}">
           
            @error("email")
            <div class="invalid-feedback">{{$message}}</div>
            @enderror

        </div>

        {{-- immagine --}}
        <div class="mb-3">
            <label for="img" class="form-label">Inserisci immagine</label>
            <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img" aria-describedby="emailHelp" value="{{ old("img") ?? $user->img}}">

            @error("img")
                <div class="invalid-feedback">{{$message}}</div>
             @enderror
        </div>

         {{-- Regione --}}
        <div class="mb-3">
            <label for="region" class="form-label">Regione</label>
            <select class="form-select  @error('region') is-invalid @enderror" aria-label="Default select example">
                <option  value="{{$region->id}}" {{ old('region_id, $user->region_id) == $region_id ? 'selected' : ''}} selected>Seleziona la regione di appartenenza</option>
                <option  value="{{ old("region") ?? $user->region}}">Abruzzo</option>
                <option  value="{{ old("region") ?? $user->region}}">Basilicata</option>
                <option  value="{{ old("region") ?? $user->region}}">Calabria</option>
                <option  value="{{ old("region") ?? $user->region}}">Campania</option>
                <option  value="{{ old("region") ?? $user->region}}">Emilia-Romagna</option>
                <option  value="{{ old("region") ?? $user->region}}">Friuli Venezia Giulia</option>
                <option  value="{{ old("region") ?? $user->region}}">Lazio</option>
                <option  value="{{ old("region") ?? $user->region}}">Liguria</option>
                <option  value="{{ old("region") ?? $user->region}}">Lombardia</option>
                <option  value="{{ old("region") ?? $user->region}}">Marche</option>
                <option  value="{{ old("region") ?? $user->region}}">Molise</option>
                <option  value="{{ old("region") ?? $user->region}}">Piemonte</option>
                <option  value="{{ old("region") ?? $user->region}}">Puglia</option>
                <option  value="{{ old("region") ?? $user->region}}">Sardegna</option>
                <option  value="{{ old("region") ?? $user->region}}">Sicilia</option>
                <option  value="{{ old("region") ?? $user->region}}">Toscana</option>
                <option  value="{{ old("region") ?? $user->region}}">Trentino Alto Adige</option>
                <option  value="{{ old("region") ?? $user->region}}">Umbria</option>
                <option  value="{{ old("region") ?? $user->region}}">Valle d'Aosta</option>
                <option  value="{{ old("region") ?? $user->region}}">Veneto</option>
            </select>

            @error("region")
                <div class="invalid-feedback">{{$message}}</div>
             @enderror
        </div>

        {{-- Telefono --}}
        <div class="mb-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="phone">+39</span>
                <input type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Numero cellulare" aria-label="Username" aria-describedby="basic-addon1" value="{{ old("phone") ?? $user->phone}}">
            </div>

            @error("phone")
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- Telefono --}}
        <div class="mb-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="cachet">€</span>
                <input type="number" class="form-control @error('cachet') is-invalid @enderror" placeholder="Cachet" aria-label="Username" aria-describedby="basic-addon1" value="{{ old("cachet") ?? $user->cachet}}">
            </div>
        
            @error("cachet")
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- Esperienza --}}
        <div class="mb-3">
            <label for="experience" class="form-label">Esperienza</label>
            <textarea placeholder="Inserisci la tua presentazione / esperienza" class="form-control @error('experience') is-invalid @enderror" id="experience" rows="3" name="experience">{{ $user->experience }}</textarea>
           
            @error("experience")
                    <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        
        <button type="submit" class="btn btn-primary">Submit</button>

</form>



@endsection