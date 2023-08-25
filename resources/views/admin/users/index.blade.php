@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-between">
        <h2>Informazioni personali</h2>
        <h1>{{  $user->name }}</h1>
        <p>{{  $user->surname }}</p>
        <h2>{{  $user->email }}</h2>
    </div>
</div>

<button type="button" class="btn btn-light">
    <a href="{{route("admin.users.create", $user)}}">Crea il profilo</a>                       
</button>

@endsection