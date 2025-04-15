@extends('layouts.app')
@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Détails de la coopérative</h1>

<div class="container">
    <div class="card">
        <div class="card-header">
            {{ $cooperative->NomFr }} ({{ $cooperative->NumCop }})
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><strong>Nom en Français:</strong> {{ $cooperative->NomFr }}</li>
                <li class="list-group-item"><strong>Nom en Arabe:</strong> {{ $cooperative->NomAr }}</li>
                <li class="list-group-item"><strong>Numéro de Coopérative:</strong> {{ $cooperative->NumCop }}</li>
                <li class="list-group-item"><strong>Téléphone:</strong> {{ $cooperative->Telephonne }}</li>
                <li class="list-group-item"><strong>Numéro d'Inscription:</strong> {{ $cooperative->NumInscrip }}</li>
                <li class="list-group-item"><strong>Date de Création:</strong> {{ $cooperative->DateCreation }}</li>
                <li class="list-group-item"><strong>Numéro Analytique:</strong> {{ $cooperative->NumAnalytique }}</li>
                <li class="list-group-item"><strong>Nombre de Collab:</strong> {{ $cooperative->NbrColl }}</li>
                <li class="list-group-item"><strong>Secteur:</strong> {{ $cooperative->Secteur }}</li>
                <li class="list-group-item"><strong>Catégorie:</strong> {{ $cooperative->Categorie }}</li>
                <li class="list-group-item"><strong>Adresse:</strong> {{ $cooperative->Adresse }}</li>
                <li class="list-group-item"><strong>Informations:</strong> {{ $cooperative->Informations }}</li>
                <li class="list-group-item"><strong>Collaborateur:</strong> {{ $cooperative->collaborateur->Id ?? 'Non défini' }}</li>
                <li class="list-group-item"><strong>Commune:</strong> {{ $cooperative->commune->Libelle ?? 'Non défini' }}</li>
                <li class="list-group-item"><strong>Déjà Bénéficié:</strong> {{ $cooperative->DejaBeneficie ? 'Oui' : 'Non' }}</li>
            </ul>
            <div class="mt-3">
                <a href="{{ route('cooperatives.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"style="margin-right: 5px;"></i> Retour à la liste</a>
            </div>
        </div>
    </div>
</div>
@endsection