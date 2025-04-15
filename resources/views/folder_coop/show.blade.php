@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails du dossier</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $folder->Id }}</p>
            <p><strong>Nom:</strong> {{ $folder->Nom }}</p>
            <p><strong>Taille:</strong> {{ $folder->Size }}</p>
            <p><strong>Observation:</strong> {{ $folder->Observation }}</p>
            <p><strong>Coopérative:</strong> {{ $folder->cooperative->NomFr ?? 'Non défini' }}</p>
        </div>
    </div>

    <a href="{{ route('folder_coops.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection
