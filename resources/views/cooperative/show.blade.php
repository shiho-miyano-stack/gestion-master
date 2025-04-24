@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Détails de la Coopérative</h1>
    <div class="row">
    <div class="card p-4 mb-4">
            <h3>{{ $cooperative->NomFr }} ({{ $cooperative->NomAr }})</h3>
            <p><strong>Numéro Coopérative:</strong> {{ $cooperative->NumCop }}</p>
            <p><strong>Nom Français:</strong> {{ $cooperative->NomFr }}</p>
            <p><strong>Nom Arabe:</strong> {{ $cooperative->NomAr }}</p>
            <p><strong>Province:</strong> {{ $cooperative->Province }}</p>
            <p><strong>Numéro d'Enregistrement:</strong> {{ $cooperative->NumEnre }}</p>
            <p><strong>Date d'Enregistrement:</strong> {{ $cooperative->Date_Enre }}</p>
            <p><strong>Téléphone:</strong> {{ $cooperative->Telephonne }}</p>
            <p><strong>Email:</strong> {{ $cooperative->Email }}</p>
            <p><strong>Date de Création:</strong> {{ $cooperative->DateCreation }}</p>
            <p><strong>Numéro d'Enregistrement Fiscal:</strong> {{ $cooperative->NumInscripFiscal }}</p>
            <p><strong>Secteur:</strong> {{ $cooperative->Secteur }}</p>
    </div>
        <div class="col-md-6">
            <p><strong>Siège:</strong> {{ $cooperative->Siege }}</p>
            <p><strong>Nature du Siège:</strong> {{ $cooperative->Nature_siege }}</p>
            <p><strong>But de la Coopérative:</strong> {{ $cooperative->But_coop }}</p>
            <p><strong>Commune:</strong> {{ $cooperative->commune->Libelle ?? 'Non spécifiée' }}</p>  <!-- Assuming relation exists -->
            <p><strong>Statut de la Coopérative:</strong> {{ $cooperative->Statut_coop }}</p>
            <p><strong>Activités de la Coopérative:</strong> {{ $cooperative->Activites_coop }}</p>
            <p><strong>Capital:</strong> {{ $cooperative->Capital }}</p>
            <p><strong>Chiffre d'Affaire:</strong> {{ $cooperative->Chiffre_affaire }}</p>
            <p><strong>Equipements:</strong> {{ $cooperative->Equipements }}</p>
            <p><strong>Date de la Dernière Assemblée:</strong> {{ $cooperative->Date_dernier_assemble }}</p>
            <p><strong>Coordonnées X:</strong> {{ $cooperative->Coord_X }}</p>
            <p><strong>Coordonnées Y:</strong> {{ $cooperative->Coord_Y }}</p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <p><strong>Nombre des Membres Masculins:</strong> {{ $cooperative->NbrMemMasc }}</p>
            <p><strong>Nombre des Jeunes Membres Masculins (18-35 ans):</strong> {{ $cooperative->NbrJeuneMemMasc }}</p>
            <p><strong>Âge du Plus Jeune Membre Masculin:</strong> {{ $cooperative->AgeJeuneMemMasc }}</p>
            <p><strong>Âge du Membre le Plus Âgé Masculin:</strong> {{ $cooperative->AgeGrandMemMasc }}</p>
        </div>
        
        <div class="col-md-6">
            <p><strong>Nombre des Membres Féminins:</strong> {{ $cooperative->NbrMemFem }}</p>
            <p><strong>Nombre des Jeunes Membres Féminins (18-35 ans):</strong> {{ $cooperative->NbrJeuneMemFem }}</p>
            <p><strong>Âge du Plus Jeune Membre Féminin:</strong> {{ $cooperative->AgeJeuneMemFem }}</p>
            <p><strong>Âge du Membre le Plus Âgé Féminin:</strong> {{ $cooperative->AgeGrandMemFem }}</p>
        </div>
    </div>

    <div class="mb-4">
        <h3>Collaborateurs associés</h3>
        @if($cooperative->collaborateurs->isEmpty())
            <p>Aucun collaborateur associé à cette coopérative.</p>
        @else
            <ul class="list-group">
                @foreach($cooperative->collaborateurs as $collaborateur)
                    <li class="list-group-item">
                        <strong>Nom :</strong> {{ $collaborateur->NomFr }}<br>
                        <strong>Email :</strong> {{ $collaborateur->Email }}<br>
                        <strong>Téléphone :</strong> {{ $collaborateur->Telephonne }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="mb-4">
        <h3>Membres de la Coopérative</h3>
        @if($cooperative->membres->count())
            <ul class="list-group">
                @foreach($cooperative->membres as $membre)
                    <li class="list-group-item">
                        <strong>{{ $membre->NomFr }}</strong> ({{ $membre->Poste }})<br>
                        <strong>CNI :</strong> {{ $membre->CNI }}<br>
                        <strong>Téléphone :</strong> {{ $membre->Telephonne }}<br>
                        <strong>Email :</strong> {{ $membre->Email }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>Aucun membre enregistré pour cette coopérative.</p>
        @endif
    </div>

    <a href="{{ route('cooperatives.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
