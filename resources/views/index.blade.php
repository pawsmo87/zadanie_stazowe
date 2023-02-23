@extends('layouts.app')

@section('content')
    <h1>Lista użytkowników</h1>

    <a href="{{ route('user.create') }}">Dodaj użytkownika</a>

    <ul>
    @foreach ($users as $user)
        <li>{{ $user->name }} - {{ $user->email }} 
            <a href="{{ route('user.edit', $user->id) }}">Edytuj</a>
            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Usuń</button>
            </form>
        </li>
    @endforeach
    </ul>
    <div id="app"> <example-component></example-component></div>
@endsection