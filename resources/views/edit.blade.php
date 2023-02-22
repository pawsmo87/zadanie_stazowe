@extends('layouts.app')

@section('content')
    <h1>Edytuj użytkownika</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Imię i nazwisko:</label><br>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required><br>
        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required><br>
        <button type="submit">Zapisz zmiany</button>
    </form>
@endsection