@extends('layouts.admin')
@php
    $user = Auth::user();        
@endphp
@section('content')
<h3 class="fw-bold text-white">Statistiche</h3>

<div class="container">
    <div class="row">
        <div class="col-6 d-flex flex-wrap">
            <div class="col-12 mx-2 my-3">
                <canvas id="graficMessagges"></canvas>
            </div>

            <div class="col-12 mx-2 my-3">
                <canvas id="graficReviews"></canvas>
            </div>
        </div>
        <div class="col-6 d-flex justify-content-center align-items-center">
            <div class="col-12 mx-2">
                <canvas id="graficVotes"></canvas>
            </div>
        </div>
    </div>
</div>


<script>

        //// MESSAGGI GRAFICO /////
        // Recupera i dati dei messaggi dal controller o da dove li hai
        let messages = {!! json_encode($user->messages) !!}; // Converte i dati dei messaggi in JSON
        console.log(messages);

        // Crea un oggetto per conteggiare i messaggi per ciascuna data
        let messageCounts = {};

        // Itera attraverso i messaggi e conta i messaggi per ciascuna data
        messages.forEach(function(message) {
            let date = new Date(message.created_at); // Converti la data in un oggetto Data
            let formattedDate = date.toLocaleDateString(); // Ottieni la data formattata senza l'orario

            if (!messageCounts[formattedDate]) {
                messageCounts[formattedDate] = 0;
            }
            messageCounts[formattedDate]++;
            });


        console.log(messageCounts);

        // Estrai le date e i conteggi dai dati
        let dates = Object.keys(messageCounts);
        let counts = Object.values(messageCounts);

        // Configura il contesto del grafico
        let ctx = document.getElementById('graficMessagges').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'bar', // Tipo di grafico (puoi cambiare a 'line' o altro)
            data: {
                labels: dates, // Etichette sull'asse x (date dei messaggi)
                datasets: [{
                    label: 'Messaggi', // Etichetta del dataset
                    data: counts, // Dati da visualizzare sul grafico
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Colore dell'area del grafico
                    borderColor: 'rgba(75, 192, 192, 1)', // Colore del bordo
                    borderWidth: 5 // Larghezza del bordo
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

        //// RECENSIONI GRAFICO ////

        // Recupera i dati dei messaggi dal controller o da dove li hai
        let reviews = {!! json_encode($user->reviews) !!}; // Converte i dati dei messaggi in JSON
        console.log(reviews);

        // Crea un oggetto per conteggiare i messaggi per ciascuna data
        let reviewCounts = {};

        // Itera attraverso i messaggi e conta i messaggi per ciascuna data
        reviews.forEach(function(review) {
            let date = new Date(review.created_at); // Converti la data in un oggetto Data
            let formattedDate = date.toLocaleDateString(); // Ottieni la data formattata senza l'orario
        
            if (!reviewCounts[formattedDate]) {
                reviewCounts[formattedDate] = 0;
            }
            reviewCounts[formattedDate]++;
            });
        
        
        console.log(reviewCounts);
       
             
        // Estrai le date e i conteggi dai dati
        let datesReview = Object.keys(reviewCounts);
        let countsReview = Object.values(reviewCounts);
        
        // Configura il contesto del grafico
        let reviewCtx = document.getElementById('graficReviews').getContext('2d');
        let myChartReview = new Chart(reviewCtx, {
            type: 'bar', // Tipo di grafico (puoi cambiare a 'line' o altro)
            data: {
                labels: datesReview, // Etichette sull'asse x (date dei messaggi)
                datasets: [{
                    label: 'Recensioni', // Etichetta del dataset
                    data: countsReview, // Dati da visualizzare sul grafico
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Colore dell'area del grafico
                    borderColor: 'rgba(75, 192, 192, 1)', // Colore del bordo
                    borderWidth: 5 // Larghezza del bordo
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


        //// VOTI GRAFICO /////
        // Recupera i dati dei messaggi dal controller o da dove li hai
        let votes = {!! json_encode($user->votes) !!}; // Converte i dati dei messaggi in JSON
        console.log(votes);

        // Crea un oggetto per conteggiare i messaggi per ciascuna data
        let voteCounts = {};

        // Itera attraverso i messaggi e conta i messaggi per ciascuna data
        votes.forEach(function(vote) {
            let date = new Date(vote.created_at); // Converti la data in un oggetto Data
            let formattedDate = date.toLocaleDateString(); // Ottieni la data formattata senza l'orario
        
            if (!voteCounts[formattedDate]) {
                voteCounts[formattedDate] = 0;
            }
            voteCounts[formattedDate]++;
            });
        
        
        console.log(voteCounts);
       
             
        // Estrai le date e i conteggi dai dati
        let datesVote = Object.keys(voteCounts);
        let countsVote = Object.values(voteCounts);
        
        // Configura il contesto del grafico
        let voteCtx = document.getElementById('graficVotes').getContext('2d');
        let myChartVote = new Chart(voteCtx, {
            type: 'bar', // Tipo di grafico (puoi cambiare a 'line' o altro)
            data: {
                labels: datesVote, // Etichette sull'asse x (date dei messaggi)
                datasets: [{
                    label: 'Voti', // Etichetta del dataset
                    data: countsVote, // Dati da visualizzare sul grafico
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Colore dell'area del grafico
                    borderColor: 'rgba(75, 192, 192, 1)', // Colore del bordo
                    borderWidth: 5 // Larghezza del bordo
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
    

</script>
@endsection
