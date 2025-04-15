@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Dossiers Coopératives</h2>
    <a href="{{ route('folder_coops.create') }}" class="btn btn-primary mb-3">Ajouter un dossier</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table border=1 class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Taille</th>
                <th>Observation</th>
                <th>Coopérative</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($folders as $folder)
                <tr>
                    <td>{{ $folder->Id }}</td>
                    <td>{{ $folder->Nom }}</td>
                    <td>{{ $folder->Size }}</td>
                    <td>{{ $folder->Observation }}</td>
                    <td>{{ $folder->cooperative->NomFr ?? 'Non défini' }}</td>
                    <td>
                        <a href="{{ route('folder_coops.show', $folder) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('folder_coops.edit', $folder) }}" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="{{ route('folder_coops.destroy', $folder) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce dossier ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
