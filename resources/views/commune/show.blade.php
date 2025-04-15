@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Détails de la commune</h1>

<div class="container">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <p><strong>Nom:</strong> {{ $commune->Libelle }}</p>
            <p><strong>Province:</strong> {{ $commune->province->Id }}</p>
        </div>
        <div class="mt-3">
            <a href="{{ route('communes.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"style="margin-right: 5px;"></i> Retour à la liste</a>
        </div>
        
    </div>
</div>
@endsection
