@extends('layouts.admin')

@section('content')

<h2>Crea Il tuo profilo</h2>

<form action="{{route('admin.users.update')}}" class="needs-validation" method="POST" enctype="multipart/form-data">
@csrf
@method("PUT");
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
            <select class="form-select @error('region') is-invalid @enderror" aria-label="Default select example" name="region">
                <option value="" selected>Seleziona la regione di appartenenza</option>
                @foreach (config('regions') as $region)
                    <option value="{{ $region['region'] }}" {{ old('region', $user->region) == $region['region'] ? 'selected' : '' }}>
                        {{ $region['region'] }}
                    </option>
                @endforeach
            </select>
            @error("region")
                <div class="invalid-feedback">{{$message}}</div>
             @enderror
        </div>

        {{-- Telefono --}}
        <div class="mb-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="phone">+39</span>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Numero cellulare" aria-label="Username" aria-describedby="basic-addon1" value="{{ old("phone") ?? $user->phone}}">
            </div>

            @error("phone")
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- Telefono --}}
        <div class="mb-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="cachet">€</span>
                <input type="text" class="form-control @error('cachet') is-invalid @enderror" placeholder="Cachet" aria-label="Username" aria-describedby="basic-addon1" value="{{ old("cachet") ?? $user->cachet}}">
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