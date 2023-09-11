@extends('layouts.admin')

@section('content')
@php
    $user = Auth::user();        
@endphp
<div class="container">
    <div class="row">
        <div class="col-12">
            {{-- RECENSIONI --}}
<h3 class="text-white fw-bold pb-4">Recensioni ricevute</h3>

@if ($user->reviews->isEmpty())
<div class="d-flex justify-center align-items-center">
    <p>Nessuna recensione ricevuta.</p>
</div>
@else
    <table class="table_ ">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Review</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->reviews as $review)
            <tr>
                <td class="text-white" data-label="">{{$review->created_at->format('d/m/y')}}</td>
                <td class="text-white" data-label="Name">{{$review->name}}</td>
                <td class="text-white text-truncate" data-label="Email">{{$review->email}}</td>
                <td class="text-white" data-label="Review">{{$review->comment}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

{{-- VOTI --}}
<h3 class="text-white fw-bold pt-5 pb-4">Voti Ricevuti</h3>

@if ($user->votes->isEmpty())
<div class="d-flex justify-center align-items-center">
    <p>Nessun voto ricevuto.</p>
</div>
@else
    <table class="table table-borderless ">
        <thead>
            <tr>
                <th class="fw-bolder">Voti</th>
                <th class="fw-bolder">Quantità</th>
            </tr>
        </thead>
        <tbody>
            @php
                $votesCount = []; // Inizializza un array vuoto per conteggiare i voti per ciascun voto
            @endphp
            @foreach ($user->votes as $vote)
            @php
                $numeroStelle = $vote->vote;
            @endphp
            @if (!isset($votesCount[$numeroStelle]))
                @php
                    $votesCount[$numeroStelle] = 1;
                @endphp
            @else
                @php
                    $votesCount[$numeroStelle]++;
                @endphp
            @endif
            @endforeach

            @foreach ($votesCount as $voteValue => $count)
            <tr>
                <td>
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $voteValue)
                        <i class="fa-solid fa-star" style="color: #ab8ae0;"></i>
                        @else
                        <i class="fa-solid fa-star" style="color: #000000;"></i>
                        @endif
                    @endfor
                </td>
                <td>{{$count}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
        </div>
    </div>
</div>


@endsection
