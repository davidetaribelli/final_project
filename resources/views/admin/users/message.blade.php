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
    <table class="table table-borderless">
        <thead>
            <tr>
                <th class="fw-bolder"></th>
                <th class="fw-bolder">Name</th>
                <th class="fw-bolder">Message</th>
                <th class="fw-bolder">Email</th>
                <th class="fw-bolder"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->messages as $message)
            <tr>
                <td>
                    <small class="badge text-black">
                        {{$message->created_at->format('d/m/y')}}
                    </small>
                </td>
                <td>{{$message->name}}</td>
                <td>{{$message->message}}</td>
                <td>{{$message->email}}</td>
                <td>
                    <a href="{{ route('admin.singleMessage.show', $message) }}">Visualizza Messaggio Completo</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
