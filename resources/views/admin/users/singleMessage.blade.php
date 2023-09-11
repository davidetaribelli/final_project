@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h3 class="text-white fw-bold ps-0 pb-4">Messaggio Completo</h3>

        <div class="card">
            <div class="card-body">
                <p class="text-black"><strong>Nome:</strong> {{ $message->name }}</p>
                <p><strong>Email:</strong> {{ $message->email }}</p>
                <p><strong>Messaggio:</strong> {{ $message->message }}</p>
                <p><strong>Data Invio del Messaggio:</strong> {{ $message->created_at ? $message->created_at->format('d/m/y') : 'Data non disponibile' }}</p>
            </div>
        </div>

        <div class="col-3 my-3 ps-0 pt-2">
            <a href="{{ route('admin.user.message') }}" class="btn btn-secondary">Torna Indietro</a>
        </div>
    </div>
</div>

@endsection

