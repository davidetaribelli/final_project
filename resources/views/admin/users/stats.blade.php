@extends('layouts.admin')
@php
    $user = Auth::user();        
@endphp
@section('content')
<h1>stats</h1>

<div class="container">
    <div class="row">
        <div class="col-12 d-flex flex-wrap">
            <div class="col-6 mx-2">
                <canvas id="graficMessagges"></canvas>
            </div>

            {{-- <div class="col-5 mx-2">
                <canvas id="graficReviews"></canvas>
            </div>

            <div class="col-5 mx-2">
                <canvas id="graficVotes"></canvas>
            </div> --}}
        </div>
    </div>
</div>


<script>
        // Recupera i dati dei messaggi dal controller o da dove li hai
        let messages = {!! json_encode($user->messages) !!}; // Converte i dati dei messaggi in JSON
        console.log(messages);
        // Estrai le date e i messaggi dai dati
        let dates = messages.map(function(message) {
            return message.date;
        });

        let messageCounts = messages.map(function(message) {
            return message.message;
        });
        console.log(messageCounts)

        // Configura il contesto del grafico
        let ctx = document.getElementById('graficMessagges').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'bar', // Tipo di grafico (puoi cambiare a 'line' o altro)
            data: {
                labels: dates, // Etichette sull'asse x (date dei messaggi)
                datasets: [{
                    label: 'Messaggi', // Etichetta del dataset
                    data: messageCounts, // Dati da visualizzare sul grafico
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Colore dell'area del grafico
                    borderColor: 'rgba(75, 192, 192, 1)', // Colore del bordo
                    borderWidth: 1 // Larghezza del bordo
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    // var reviewsChart = new Chart(document.getElementById("graficReviews"), {
    //     type: 'bar', // Puoi scegliere il tipo di grafico desiderato
    //     data: {
    //         labels: [], // Inserisci le etichette delle date qui
    //         datasets: [{
    //             label: 'Reviews',
    //             data:  {!! json_encode($user->reviews) !!}, // Inserisci i dati dei messaggi qui
    //             backgroundColor: 'rgba(75, 192, 192, 0.2)', 
    //             borderColor: 'rgba(75, 192, 192, 1)', 
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
            
    //     }
    // });

    // var votesChart = new Chart(document.getElementById("graficVotes"), {
    //     type: 'bar', // Puoi scegliere il tipo di grafico desiderato
    //     data: {
    //         labels: [], // Inserisci le etichette delle date qui
    //         datasets: [{
    //             label: 'Votes',
    //             data: {!! json_encode($user->votes) !!}, // Inserisci i dati dei messaggi qui
    //             backgroundColor: 'rgba(75, 192, 192, 0.2)', 
    //             borderColor: 'rgba(75, 192, 192, 1)', 
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         // Personalizza le opzioni del grafico, ad esempio titolo, legenda, ecc.
    //     }
    // });

    

</script>
@endsection
