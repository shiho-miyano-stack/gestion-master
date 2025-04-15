@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Détails de la subvention</h1>

<div class="container">

    <div class="mb-3"><strong>Type :</strong> {{ $subvention->Type_Sub }}</div>
    <div class="mb-3"><strong>Montant :</strong> {{ $subvention->Montant }}</div>
    <div class="mb-3"><strong>Date de Transfert :</strong> {{ $subvention->DateTransfert }}</div>
    <div class="mb-3"><strong>Date de Dépôt :</strong> {{ $subvention->DateDepot }}</div>
    <div class="mt-3">
        <a href="{{ route('subventions.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"style="margin-right: 5px;"></i> Retour à la liste</a>
    </div>
</div>
@endsection
