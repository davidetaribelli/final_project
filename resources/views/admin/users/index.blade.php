@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-between">
        <h2>Il tuo Profilo</h2>
        <h1>{{  $user->name }}</h1>
        <p>{{  $user->surname }}</p>
        <h2>{{  $user->email }}</h2>
        Numero Di telefono:<h2>{{  $user->phone }}</h2> 
        Prezzo:<h2>{{  $user->cachet }}</h2> 
        <img src={{$user->img}} alt={{$user->name}}>
    </div>
</div>

<button type="button" class="mt-4">
    <a class="btn btn-light" href="{{route("admin.users.edit", $user->id)}}">Modifica il profilo</a>                       
</button>

@endsection