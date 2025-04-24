@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails du Document</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID :</strong> {{ $document->id }}</p>
            <p><strong>Nom Fichier :</strong> {{ $document->nom_fichier }}</p>
            <p><strong>Type :</strong> {{ $document->type_fichier }}</p>
            <p><strong>Date Ajout :</strong> {{ $document->date_ajout }}</p>
            <p><strong>ID Demande :</strong> {{ $document->demande_id }}</p>

            @if ($document->chemin_fichier && Storage::disk('public')->exists($document->chemin_fichier))
    <p><strong>Voir :</strong> 
        <a href="{{ asset('storage/' . $document->chemin_fichier) }}" target="_blank">
            {{ $document->nom_fichier }}
        </a>
    </p>
@else
    <p class="text-danger">Fichier introuvable</p>
@endif

            <a href="{{ route('documents.index') }}" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</div>
@endsection
