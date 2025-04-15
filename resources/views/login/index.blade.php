
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Connexions</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('logins.create') }}" class="btn btn-primary mb-3">Ajouter un Login</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Mot de Passe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logins as $login)
                <tr>
                    <td>{{ $login->Id }}</td>
                    <td>{{ $login->Log }}</td>
                    <td>{{ $login->Pass }}</td>
                    <td>
                        <a href="{{ route('logins.show', $login) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('logins.edit', $login) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('logins.destroy', $login) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce login ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


