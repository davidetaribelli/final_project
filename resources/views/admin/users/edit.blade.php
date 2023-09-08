@extends('layouts.admin')

@section('content')

{{-- avviso se id in url è diverso da id di auth --}}
<div class="container">
    @if (isset($IDerror))
    {{-- versione con messaggio html e classi bootsap --}}
        {{-- <div class="alert alert-danger">
            {{ $IDerror }}
        </div> --}}
        {{-- versione popup js  --}}
        <script>
            window.onload = function() {
                alert("{{ $IDerror }}");
            };
        </script>
    @endif
    <h2 class="text-white fw-bold">Crea il tuo profilo</h2>
    <div class="container-fluid mt-4">
        <div class="row">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="">
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
    
            <form action="{{route('admin.users.update', $user->id)}}" class="needs-validation p-0" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                    {{-- Nome --}}
                    <div class="mb-3">
                        <label for="name" class="form-label badge btnColor fs-5">Nome</label>
                        <input type="text" placeholder="Inserisci nome" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" value="{{ old("name") ?? $user->name}}">
                    
                        @error("name")
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                
                    {{-- Cognome --}}
                    <div class="mb-3">
                        <label for="surname" class="form-label badge btnColor fs-5">Cognome</label>
                        {{-- <textarea class="form-control  @error('description') is-invalid @enderror" id="description" rows="3" name="description" value="{{old("description")}}">
                        </textarea> --}}
                        <input type="text" placeholder="Inserisci cognome" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" aria-describedby="emailHelp" value="{{ old("surname") ?? $user->surname}}">
    
                        @error("surname")
                                <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
    
                    {{-- Email --}}
                    <div class="mb-3">
    
                        <label for="type_id" class="form-label badge btnColor fs-5">Email</label>
                        <input type="email" placeholder="Inserici email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{ old("email") ?? $user->email}}">
    
                        @error("email")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
    
                    </div>
    
                    {{-- immagine --}}
                    <div class="mb-3">
                        <label for="img" class="form-label badge btnColor fs-5">Immagine Profilo</label>
                        <input type="file" class="form-control  @error('img') is-invalid @enderror" id="img" name="img" aria-describedby="emailHelp" value="{{ old("img") ?? $user->img}}">
    
                        @error("img")
                            <div class="invalid-feedback">{{$message}}</div>
                         @enderror
                    </div>
    
                     {{-- Regione --}}
                    <div class="mb-3">
                        <label for="region" class="form-label badge btnColor fs-5">Regione</label>
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
                        <label for="phone" class="form-label badge btnColor fs-5">Telefono</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" aria-describedby="" value="{{ old("phone") ?? $user->phone}}">
    
                        @error("phone")
                            <div class="invalid-feedback">{{$message}}</div>
                         @enderror
                    </div>
    
                    {{-- Prezzo --}}
                    <div class="mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text badge btnColor fs-5 border-0" id="cachet">€</span>
                            <input type="number" class="form-control @error('cachet') is-invalid @enderror" id="cachet" name="cachet" aria-describedby="" value="{{ old("cachet") ?? $user->cachet}}">
                        </div>
    
                        @error("cachet")
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
    
                    {{-- Genere --}}        
                    <div class="mb-3">
                        <label for="genre" class="form-label badge btnColor fs-5">Genere</label>
                            @foreach ($genres as $i=>$genre)
                            <div class="form-check">
                                <input type="checkbox" value="{{$genre->id}}" name="genres[]" id="genres{{$i}}" class="form-check-input" 
                                {{ in_array($genre->id, old('genres', $user->genres->pluck('id')->toArray())) ? 'checked' : '' }}>
                                <label for="genres{{$i}}" class="form-check-label">{{$genre->name}}</label>
                            </div>
                            @endforeach
    
                        @error("genre")
                            <div class="invalid-feedback">{{$message}}</div>
                         @enderror
                    </div>
    
                    {{-- Esperienza --}}
                    <div class="mb-3">
                        <label for="experience" class="form-label badge btnColor fs-5">Esperienza</label>
                        <textarea placeholder="Inserisci la tua presentazione / esperienza" class="form-control @error('experience') is-invalid @enderror" id="experience" rows="3" name="experience">{{ $user->experience }}</textarea>
    
                        @error("experience")
                                <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
    
    
                    <button type="submit" class=" btn btn-light btnColor border-0 text-white fs-5 fw-bold">Submit</button>
    
                </form>
        </div>
    </div>
</div>



@endsection