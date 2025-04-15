@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Folder Subvs</h1>
        <a href="{{ route('folder_subvs.create') }}" class="btn btn-primary mb-3">Ajouter un Folder Subv</a>
        <table border=1 class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Taille</th>
                    <th>ID Subv</th>
                    <th>Observation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($folderSubvs as $folder_subv)
                    <tr>
                        <td>{{ $folder_subv->Id }}</td>
                        <td>{{ $folder_subv->Nom }}</td>
                        <td>{{ $folder_subv->Size }}</td>
                        <td>{{ $folder_subv->IdSubv }}</td>
                        <td>{{ $folder_subv->Observation }}</td>
                        <td>
                            <a href="{{ route('folder_subvs.show', $folder_subv) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('folder_subvs.edit', $folder_subv) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('folder_subvs.destroy', $folder_subv) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
