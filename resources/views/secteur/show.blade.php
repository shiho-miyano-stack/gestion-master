@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Détails du secteur</h1>

    <div class="container">
        <p><strong>Secteur:</strong> {{ $secteur->Libelle }}</p>
        <div class="mt-3">
            <a href="{{ route('secteurs.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"style="margin-right: 5px;"></i> Retour à la liste</a>
        </div>
    </div>
@endsection
