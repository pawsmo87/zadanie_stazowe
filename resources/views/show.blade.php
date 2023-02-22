@extends('layouts.app')

@section('content')
    <h1>Profil użytkownika</h1>

    <p><strong>Imię i nazwisko:</strong> {{ $user->name }}</p>
    <p><strong>E-mail:</strong> {{ $user->email }}</p>

    <a href="{{ route('user.edit', $user->id) }}">Edytuj</a>
    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Usuń</button>