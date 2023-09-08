@extends('layouts.admin')

@section('content')
@php
    $user = Auth::user();        
@endphp

<div class="container">
    <div class="row">
        <h3 class="text-white fw-bold p-0">Messaggi Ricevuti</h3>
        @if ($user->messages->isEmpty())
        <div class="d-flex justify-center align-items-center">
            <p>Nessun messaggio ricevuto per eventi.</p>
        </div>
        @else
        <div class="col-12 p-0">
            <table class="table_">
                <thead>
                  <th></th>
                  <th>Name</th>
                  <th>Message</th>
                  <th>Email</th>
                  <th></th>
                </thead>
                <tbody>
                    @foreach ($user->messages as $message)
                    <tr>
                        <td class="text-white" data-label="">{{$message->created_at->format('d/m/y')}}</td>
                        <td class="text-white" data-label="Name">{{$message->name}}</td>
                        <td class="text-white text-truncate" data-label="Message">{{$message->message}}</td>
                        <td class="text-white text-truncate" data-label="Email">{{$message->email}}</td>
                        <td class="text-white" data-label="">
                            <a class="btn btn-danger" href="{{ route('admin.singleMessage.show', $message) }}">Visualizza</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    @endif
    </div>
</div>

@endsection
