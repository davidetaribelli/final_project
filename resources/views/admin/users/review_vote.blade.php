@extends('layouts.admin')

@section('content')
@php
    $user = Auth::user();        
@endphp

{{-- RECENSIONI --}}
<h3 class="text-white fw-bold">Recensioni ricevute</h3>

@if ($user->reviews->isEmpty())
<div class="d-flex justify-center align-items-center">
    <p>Nessuna recensione ricevuta.</p>
</div>
@else
    <table class="table table-borderless">
        <thead>
            <tr>
                <th class="fw-bolder"></th>
                <th class="fw-bolder">Name</th>
                <th class="fw-bolder">Email</th>
                <th class="fw-bolder">Comment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->reviews as $review)
            <tr>
                <td>
                    <small class="badge text-black">
                        {{$review->created_at->format('d/m/y')}}
                    </small>
                </td>
                <td>{{$review->name}}</td>
                <td>{{$review->email}}</td>
                <td>{{$review->comment}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

{{-- VOTI --}}
<h3 class="text-white fw-bold">Voti Ricevuti</h3>

@if ($user->votes->isEmpty())
<div class="d-flex justify-center align-items-center">
    <p>Nessun voto ricevuto.</p>
</div>
@else
    <table class="table table-borderless">
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
                        <i class="fa-solid fa-star" style="color: gold;"></i>
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

@endsection
