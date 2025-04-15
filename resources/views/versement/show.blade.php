@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Détails du versement</h1>

<div class="container">
    
    <p><strong>Date de Versement:</strong> {{ $versement->DateVers }}</p>
    <p><strong>Montant:</strong> {{ $versement->Montant }}</p>
    <p><strong>Subvention:</strong> {{ $versement->subvention->Id }}</p>
    <div class="mt-3">
        <a href="{{ route('versements.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"style="margin-right: 5px;"></i> Retour à la liste</a>
    </div>
    
</div>
@endsection
