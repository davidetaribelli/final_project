@extends('layouts.admin')
@php
    $user = Auth::user();        
@endphp
@section('content')
<h1>stats</h1>

<div class="container">
    <div class="row">
        <div class="col-12 d-flex flex-wrap">
            <div class="col-5 mx-2">
                <canvas id="graficMessagges"></canvas>
            </div>

            <div class="col-5 mx-2">
                <canvas id="graficReviews"></canvas>
            </div>

            <div class="col-5 mx-2">
                <canvas id="graficVotes"></canvas>
            </div>
        </div>
    </div>
</div>


<script>
    // Ottieni i dati dal controller
    var messsages = {!! json_encode($user->messagges) !!};
    var reviews = {!! json_encode($user->reviews) !!};
    var votes = {!! json_encode($user->votes) !!};

    // Crea un grafico per i messaggi
    var messaggesChart = new Chart(document.getElementById("graficMessagges"), {
        type: 'bar', // Puoi scegliere il tipo di grafico desiderato
        data: {
            labels: [], // Inserisci le etichette delle date qui
            datasets: [{
                label: 'Messagges',
                data: {!! json_encode($user->messagges) !!}, // Inserisci i dati dei messaggi qui
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Colore di sfondo del grafico
                borderColor: 'rgba(75, 192, 192, 1)', // Colore del bordo del grafico
                borderWidth: 1
            }]
        },
        options: {
            // Personalizza le opzioni del grafico, ad esempio titolo, legenda, ecc.
        }
    });

    var reviewsChart = new Chart(document.getElementById("graficReviews"), {
        type: 'bar', // Puoi scegliere il tipo di grafico desiderato
        data: {
            labels: [], // Inserisci le etichette delle date qui
            datasets: [{
                label: 'Reviews',
                data:  {!! json_encode($user->reviews) !!}, // Inserisci i dati dei messaggi qui
                backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                borderColor: 'rgba(75, 192, 192, 1)', 
                borderWidth: 1
            }]
        },
        options: {
            
        }
    });

    var votesChart = new Chart(document.getElementById("graficVotes"), {
        type: 'bar', // Puoi scegliere il tipo di grafico desiderato
        data: {
            labels: [], // Inserisci le etichette delle date qui
            datasets: [{
                label: 'Votes',
                data: {!! json_encode($user->votes) !!}, // Inserisci i dati dei messaggi qui
                backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                borderColor: 'rgba(75, 192, 192, 1)', 
                borderWidth: 1
            }]
        },
        options: {
            // Personalizza le opzioni del grafico, ad esempio titolo, legenda, ecc.
        }
    });

    

</script>
@endsection
