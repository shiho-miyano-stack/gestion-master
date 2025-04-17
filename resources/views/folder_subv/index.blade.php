<!-- resources/views/folder_subv/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Dossiers</h1>

    <a href="{{ route('folder_subvs.create') }}" class="btn btn-primary mb-3">Ajouter un Dossier</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Size (Mo)</th>
                <th>Subvention</th>
                <th>Observation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($folders as $folder)
                <tr>
                    <td>{{ $folder->Nom }}</td>
                    <td>{{ $folder->Size }}</td>
                    <td>{{ $folder->subvention->Type_Sub }}</td>
                    <td>{{ $folder->Observation }}</td>
                    <td>
                        <a href="{{ route('folder_subvs.show', $folder) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('folder_subvs.edit', $folder) }}" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="{{ route('folder_subvs.destroy', $folder) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
