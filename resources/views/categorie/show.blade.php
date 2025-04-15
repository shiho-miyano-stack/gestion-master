@extends('layouts.app')

@section('content')
    <h1 style="text-align:center;">Détails de la catégorie</h1>
    <div class="card">
            <div class="card-body">
                <h5 class="card-title">Catégorie</h5>
                <p class="card-text">{{ $categorie->Libelle }}</p>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('categories.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"style="margin-right: 5px;"></i> Retour à la liste</a>
        </div>
@endsection
