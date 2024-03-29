@extends('layouts.admin')

@php
    $user = Auth::user(); 
    // dd($user->votes);
@endphp
@section('content')

<div class="container">
    <div class="row">
        <h3 class="fw-bold text-white">Statistiche</h3>
        <div class="col-6">
            <div class="col-12 mx-2 my-3">
                <canvas id="graficMessagges"></canvas>
            </div>
        
            <div class="col-12 mx-2 my-3">
                <canvas id="graficReviews"></canvas>
            </div>
        </div>
        <div class="col-6 d-flex align-items-center">
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



        // Estrai le date e i conteggi dai dati
        let dates = Object.keys(messageCounts);
        dates.sort((a, b) => new Date(a) - new Date(b));

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
            backgroundColor: 'rgba(255, 255, 255, 0.7)', // Colore dell'area del grafico
            borderColor: 'rgba(0, 0, 0)', // Colore del bordo
            borderWidth: 2 // Larghezza del bordo
        }]
    },
    options: {
        
        scales: {
            x: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0)' // Cambia il colore delle linee dell'asse X
                },
                ticks: {
                    color: 'black' // Cambia il colore delle etichette dell'asse X
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0)' // Cambia il colore delle linee dell'asse Y
                },
                ticks: {
                    color: 'black' // Cambia il colore delle etichette dell'asse Y
                }
            }
        }
    }
});

        //// RECENSIONI GRAFICO ////

        // Recupera i dati dei messaggi dal controller o da dove li hai
        let reviews = {!! json_encode($user->reviews) !!}; // Converte i dati dei messaggi in JSON

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
        
        
       
             
        // Estrai le date e i conteggi dai dati
        let datesReview = Object.keys(reviewCounts);
        datesReview.sort((a, b) => new Date(a) - new Date(b));

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
                    backgroundColor: 'rgba(255, 255, 255, 0.7)', // Colore dell'area del grafico
                    borderColor: 'rgba(0, 0, 0)', // Colore del bordo
                    borderWidth: 2 // Larghezza del bordo
                }]
            },
            options: {
        scales: {
            x: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0)' // Cambia il colore delle linee dell'asse X
                },
                ticks: {
                    color: 'black' // Cambia il colore delle etichette dell'asse X
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0)' // Cambia il colore delle linee dell'asse Y
                },
                ticks: {
                    color: 'black' // Cambia il colore delle etichette dell'asse Y
                }
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
            let date = new Date(vote.pivot.date); // Converti la data in un oggetto Data
            let dateVoteFormatted = date.toLocaleDateString(); // Ottieni la data formattata senza l'orario
            
            if (!voteCounts[dateVoteFormatted]) {
                voteCounts[dateVoteFormatted] = 0;
            }
            voteCounts[dateVoteFormatted]++;
            });
        
        
       
             
        // Estrai le date e i conteggi dai dati
        let datesVote = Object.keys(voteCounts);
        datesVote.sort((a, b) => new Date(a) - new Date(b));
        console.log(datesVote)
        let countsVote = Object.values(voteCounts);
        
        // Configura il contesto del grafico
        let voteCtx = document.getElementById('graficVotes').getContext('2d');
        let myChartVote = new Chart(voteCtx, {
            type: 'line', // Tipo di grafico (puoi cambiare a 'line' o altro)
            data: {
                labels: datesVote, // Etichette sull'asse x (date dei messaggi)
                datasets: [{
                    label: 'Voti',  // Etichetta del dataset
                    data: countsVote, // Dati da visualizzare sul grafico
                    backgroundColor: 'rgba(255, 255, 255, 0.7)', // Colore dell'area del grafico
                    borderColor: 'rgba(0, 0, 0)', // Colore del bordo
                    borderWidth: 3 // Larghezza del bordo
                }]
            },
            options: {
            scales: {
                x: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0)' // Cambia il colore delle linee dell'asse X
                    },
                    ticks: {
                        color: 'black' // Cambia il colore delle etichette dell'asse X
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0)' // Cambia il colore delle linee dell'asse Y
                    },
                    ticks: {
                        color: 'black' // Cambia il colore delle etichette dell'asse Y
                    }
                }
            }
        }
    });
    

</script>
@endsection
