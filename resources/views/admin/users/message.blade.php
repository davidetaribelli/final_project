@extends('layouts.admin')

@section('content')
@php
    $user = Auth::user();        
@endphp

<div class="col-sm-12 col-xl-6 d-flex">
    <div class="col-sm-3 col-md-6 p-2">
        <h3 class="text-white fw-bold">VOTI</h3>
    @foreach ($user->messages as $message)

    <div class="badge btnColor stelle fs-5 my-4">
        
        {{$message -> message}}

    </div>
    @endforeach
</div>
@endsection