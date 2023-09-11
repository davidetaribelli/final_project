@extends('layouts.app')

@section('content')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("form");

        form.addEventListener("submit", function(event) {
            const passwordInput = document.getElementById("password");
            const confirmPasswordInput = document.getElementById("password-confirm");
            const emailInput = document.getElementById("email");
            const nameInput = document.getElementById("name");
            const surnameInput = document.getElementById("surname");

            let errors = [];

            if (passwordInput.value !== confirmPasswordInput.value) {
                errors.push("Le password non corrispondono.");
            }

            if (!emailInput.value.includes("@")) {
                errors.push("L'indirizzo email non è valido.");
            }

            if (nameInput.value.length < 2) {
                errors.push("Il nome deve avere almeno 2 caratteri.");
            }

            if (surnameInput.value.length < 2) {
                errors.push("Il cognome deve avere almeno 2 caratteri.");
            }

            if (errors.length > 0) {
                event.preventDefault();

                const errorContainer = document.getElementById("error-container");
                errorContainer.innerHTML = "";

                errors.forEach(function(error) {
                    const errorDiv = document.createElement("div");
                    errorDiv.className = "alert alert-danger";
                    errorDiv.textContent = error;
                    errorContainer.appendChild(errorDiv);
                });
            }
        });
    });
</script>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-6">
            <div class="card rounded-5 bg_primary border-0">
                <div class="card-body d-flex justify-content-center align-items-center flex-wrap">
                    <div class="col-6 d-flex justify-content-center">
                        <h2 class="my-3 text-white fw-bold badge btnColor fs-5">Register</h2>
                    </div>
                    <div id="error-container"></div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-2 row">
                            <label for="name" class="col-md-6 col-form-label text-white text-md-right">{{ __('Name') }}</label>

                            <div class="mb-2 row">
                                <input id="name" type="text" class="rounded-4 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2 row">
                            <label for="surname" class="col-md-6 col-form-label text-white text-md-right">{{ __('Surname') }}</label>

                            <div class="mn-2 row">
                                <input id="surname" type="text" class="rounded-4 form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2 row">
                            <label for="region" class="col-md-6 col-form-label text-white text-md-right">Regione</label>
                            <div class="mb-2 row">
                                <select class="rounded-4 form-select @error('region') is-invalid @enderror" aria-label="Default select example" name="region">
                                    <option value="" selected>Seleziona la regione</option>
                                    @foreach (config('regions') as $region)
                                        <option value="{{ $region['region'] }}">
                                            {{ $region['region'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error("region")
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="mb-2 row">
                            <label for="email" class="col-md-6 col-form-label text-white text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="mb-2 row">
                                <input id="email" type="email" class="rounded-4 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2 row">
                            <label for="password" class="col-md-6 col-form-label text-white text-md-right">{{ __('Password') }}</label>

                            <div class="mb-2 row">
                                <input id="password" type="password" class="rounded-4 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2 row">
                            <label for="password-confirm" class="col-md-6 col-form-label text-white text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="mb-2 row">
                                <input id="password-confirm" type="password" class="rounded-4 form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-2 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btnColor text-white fw-bold">
                                    <span class="mx-3">{{ __('Register') }}</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
