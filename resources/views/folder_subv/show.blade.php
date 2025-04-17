<!-- resources/views/folder_subv/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Détails du Dossier</h1>

    <table class="table table-bordered">
        <tr>
            <th>Nom du Dossier</th>
            <td>{{ $folder->Nom }}</td>
        </tr>
        <tr>
            <th>Taille (Mo)</th>
            <td>{{ $folder->Size }}</td>
        </tr>
        <tr>
            <th>Subvention</th>
            <td>{{ $folder->subvention->Libelle }}</td>
        </tr>
        <tr>
            <th>Observation</th>
            <td>{{ $folder->Observation }}</td>
        </tr>
    </table>

    <a href="{{ route('folder_subvs.index') }}" class="btn btn-primary">Retour à la liste</a>
</div>
@endsection


