@extends('layouts.app')

@section('content')
    <h1>Modifier le login</h1>

    <form action="{{ route('logins.update', $login) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="log">Log</label>
            <input type="text" name="log" id="log" value="{{ $login->Log }}" required>
        </div>
        <div>
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass" value="{{$login->Pass}}">
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection

