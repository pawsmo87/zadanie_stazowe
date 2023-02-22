@extends('layouts.app')

@section('content')
    <h1>Dodaj użytkownika</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">Imię i nazwisko:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Hasło:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="password_confirmation">Potwierdź hasło:</label><br>
        <input type="password" id="password_confirmation" name="password_confirmation" required><br>
        <button type="submit">Dodaj użytkownika</button>
    </form>
@endsection