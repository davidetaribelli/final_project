@extends('layouts.admin')

@section('content')
@php
    $user = Auth::user();        
@endphp

<h3 class="text-white fw-bold">Messaggi Ricevuti</h3>

@if ($user->messages->isEmpty())
<div class="d-flex justify-center align-items-center">
    <p>Nessun messaggio ricevuto per eventi.</p>
</div>
@else
    <table class="table table-borderless ">
        <thead>
            <tr>
                <th class="fw-lighter">Name</th>
                <th class="fw-lighter">Message</th>
                <th class="fw-lighter">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->messages as $message)
            <tr>
                <td>{{$message->name}}</td>
                <td>{{$message->message}}</td>
                <td>{{$message->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
