@extends('layouts.admin')

@section('content')

@php
    $user = Auth::user();
    use Carbon\Carbon;        
@endphp

    <div class="container">
        <h1 class="mt-2 text-white">Sponsorizza il tuo profilo</h1>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.get.token') }}">
            @csrf
            <div class="row pb-5">
                @foreach ($sponsors as $sponsor)
                    <div class="col-sm-12 col-xl-4">
                        <div class="card mt-2">
                            <div class="card-body">
                                <h5 class="card-title">Sponsorizza il tuo profilo per {{ $sponsor->duration }} ore </h5>
                                <p class="card-text">{{ $sponsor->price }} €</p>
                                <input type="radio" name="selected_package" checked value="{{ $sponsor->id }}"> Seleziona
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btnColor text-white">Passa ai dettagli del pagamento</button>
        </form>

        <div class="row pt-5">
            @foreach ($sponsoredUsers as $item)
                <div class="col-sm-12 col-xl-4">
                    <div class="card mt-2">
                        <div class="card-body">

                            @if ($item->start_time < Carbon::now())
                            <div class="card-title">Sponsorizzazione attiva </div>
                            @endif

                            @if ($item->start_time > Carbon::now())
                            <div class="card-title">Sponsorizzazione futura </div>
                            @endif
                            
                            <div class="card-text">Data inizio: {{ $item->start_time }}</div>
                            <div class="card-text">Data fine: {{ $item->end_time }}</div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
