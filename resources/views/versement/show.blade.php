@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Détails du versement</h1>

<div class="container">
    
<ul class="list-group">
        <li class="list-group-item"><strong>Date : </strong>{{ $versement->DateVers }}</li>
        <li class="list-group-item"><strong>Montant : </strong>{{ $versement->Montant }}</li>
        <li class="list-group-item"><strong>Subvention ID : </strong>{{ $versement->IdSubv }}</li>
        <li class="list-group-item"><strong>Début période : </strong>{{ $versement->periode_debut }}</li>
        <li class="list-group-item"><strong>Fin période : </strong>{{ $versement->periode_fin }}</li>
        <li class="list-group-item"><strong>Mode paiement : </strong>{{ $versement->mode_paiement }}</li>
        <li class="list-group-item"><strong>Référence : </strong>{{ $versement->reference_paiement }}</li>
        <li class="list-group-item"><strong>Observation : </strong>{{ $versement->observation }}</li>
    </ul>
    <div class="mt-3">
        <a href="{{ route('versements.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"style="margin-right: 5px;"></i> Retour à la liste</a>
    </div>
    
</div>
@endsection
