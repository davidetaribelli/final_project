@extends('layouts.admin')

@section('content')

<?php 
$user = Auth::user();
?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Dati dell'utente
        const userData = @json($user);
        const genreData = @json($user->genres);

        // Elemento in cui mostrare il messaggio
        const messageElement = document.getElementById("profileMessage");

        // Lista dei dati mancanti
        const missingData = [];
        if (!userData.img) missingData.push("immagine del profilo");
        if (!userData.cachet) missingData.push("cachet");
        if (!userData.experience) missingData.push("esperienza");
        if (!genreData.length === 0) missingData.push("genere musicale");

        if (missingData.length > 0) {
            messageElement.textContent =
                "Completa il tuo profilo! Ti mancano da inserire i seguenti dati: " +
                missingData.join(", ");
            messageElement.style.display = "block";
        }
    });
</script>

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-primary" role="alert">
                    {{ session('Benvenuto') }}
                </div>
                @endif

                @auth
                    <div class="alert alert-success" role="alert">
                        {{ __('Benvenuto/a,') }} {{ Auth::user()->name }} {{ Auth::user()->surname }}!
                    </div>
                @endauth 
            </div>

            <div id="profileMessage" class="alert alert-warning mt-3" style="display: none;"></div>

            <button type="button" class="btn btn-light rounded-pill bg_cl_primary m-2 border-0">
                <a class="text-decoration-none text-dark fw-bold" href="{{route("admin.users.edit", $user)}}">Completa il tuo profilo</a>                       
            </button>

            
        </div>
    </div>
    
</div>
@endsection
