@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Folder Subvention</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $folderSubv->Id }}</p>
            <p><strong>Nom:</strong> {{ $folderSubv->Nom }}</p>
            <p><strong>Taille:</strong> {{ $folderSubv->Size }}</p>
            <p><strong>ID Subv:</strong> {{ $folderSubv->idSubv }}</p>
            <p><strong>Observation:</strong> {{ $folderSubv->Observation }}</p>

            
            @if($folderSubv->subvention)
        <p><strong>Type de Subvention:</strong> {{ $folderSubv->subvention->Id }}</p>
         @else
        <p><strong>Type de Subvention:</strong> Aucune subvention associée.</p>
         @endif
           
        </div>
    </div>

    <a href="{{ route('folder_subvs.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
</div>
@endsection

