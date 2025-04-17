@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Documents Joints</h2>

    <a href="{{ route('documents.create') }}" class="btn btn-success mb-3">Ajouter un Document</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom fichier</th>
                <th>Type</th>
                <th>Date ajout</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $document)
            <tr>
                <td>{{ $document->id }}</td>
                <td>{{ $document->nom_fichier }}</td>
                <td>{{ $document->type_fichier }}</td>
                <td>{{ $document->date_ajout }}</td>
                <td>
                    <a href="{{ route('documents.show', $document) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('documents.edit', $document) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('documents.destroy', $document) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce document ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
