@extends('layouts.admin')

@section('content')
<h3 class="text-white fw-bold">Messaggio Completo</h3>

<div class="card">
    <div class="card-body">
        <p class="text-black"><strong>Nome:</strong> {{ $message->name }}</p>
        <p><strong>Email:</strong> {{ $message->email }}</p>
        <p><strong>Messaggio:</strong> {{ $message->message }}</p>
        <p><strong>Data Invio del Messaggio:</strong> {{ $message->created_at ? $message->created_at->format('d/m/y') : 'Data non disponibile' }}</p>
    </div>
</div>

<a href="{{ route('admin.users.index') }}" class="btn btn-primary">Torna Indietro</a>
@endsection

