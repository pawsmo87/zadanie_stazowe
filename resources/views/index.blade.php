@extends('layouts.app')

@section('content')
    <h1>Lista użytkowników</h1>

    <a href="{{ route('users.create') }}">Dodaj użytkownika</a>

    <ul>
    @foreach ($users as $user)
        <li>{{ $user->name }} - {{ $user->email }} 
            <a href="{{ route('users.edit', $user->id) }}">Edytuj</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Usuń</button>
            </form>
        </li>
    @endforeach
    </ul>
@endsection