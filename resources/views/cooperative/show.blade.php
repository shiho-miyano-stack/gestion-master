@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails de la Coopérative</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nom FR:</strong> {{ $cooperative->NomFr }}</li>
        <li class="list-group-item"><strong>Nom AR:</strong> {{ $cooperative->NomAr }}</li>
        <li class="list-group-item"><strong>Commune:</strong> {{ $cooperative->commune->Libelle ?? '' }}</li>
        <li class="list-group-item"><strong>Secteur:</strong> {{ $cooperative->secteur->Libelle ?? $cooperative->Secteur }}</li>
        <li class="list-group-item"><strong>Catégorie:</strong> {{ $cooperative->categorie->Libelle ?? $cooperative->Categorie }}</li>
        <li class="list-group-item"><strong>Adresse:</strong> {{ $cooperative->Adresse }}</li>
        <li class="list-group-item"><strong>Téléphone:</strong> {{ $cooperative->Telephonne }}</li>
        <li class="list-group-item"><strong>Créée le:</strong> {{ $cooperative->DateCreation }}</li>
    </ul>
    <a href="{{ route('cooperatives.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection
