@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Détails de la demande</h1>

<div class="container">

    <div class="card">
        <div class="card-body">
            <p><strong>Statut:</strong> {{ $demande->Statut }}</p>
            <p><strong>Observation:</strong> {{ $demande->Observation }}</p>
            <p><strong>Coopérative:</strong> {{ $demande->cooperative->NomFr ?? 'Non défini' }}</p>
            <p><strong>Subvention:</strong> {{ $demande->subvention->Type_Sub ?? 'Non défini' }}</p>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('demande_subventions.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"style="margin-right: 5px;"></i> Retour à la liste</a>
    </div>
</div>
@endsection
