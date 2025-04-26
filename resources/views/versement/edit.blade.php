@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Modifier un versement</h1>

<div class="container">

    <form action="{{ route('versements.update', $versement) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="DateVers">Date du Versement</label>
            <input type="date" name="DateVers" id="DateVers" class="form-control" value="{{ $versement->DateVers }}" required>
        </div>

        <div class="form-group">
            <label for="Montant">Montant</label>
            <input type="number" step="0.01" name="Montant" id="Montant" class="form-control" value="{{ $versement->Montant }}" required>
        </div>

        <div class="form-group">
            <label for="IdSubv">Subvention</label>
            <select name="IdSubv" id="IdSubv" class="form-control" required>
                <option value="">Sélectionner une subvention</option>
                @foreach($subventions as $subvention)
                     
                <option value="{{ $subvention->Id }}" {{ $subvention->Id == old('Id', $versement->Id) ? 'selected' : '' }}>
                        {{ $subvention->Type_Sub }}</option>
                @endforeach
            </select>
            </div>
            <div class="mb-3">
    <label>Début de période</label>
    <input type="date" name="periode_debut" class="form-control" value="{{ old('periode_debut', $versement->periode_debut ?? '') }}">
</div>

<div class="mb-3">
    <label>Fin de période</label>
    <input type="date" name="periode_fin" class="form-control" value="{{ old('periode_fin', $versement->periode_fin ?? '') }}">
</div>

<div class="mb-3">
    <label>Mode de paiement</label>
    <input type="text" name="mode_paiement" class="form-control" value="{{ old('mode_paiement', $versement->mode_paiement ?? '') }}">
</div>

<div class="mb-3">
    <label>Référence de paiement</label>
    <input type="text" name="reference_paiement" class="form-control" value="{{ old('reference_paiement', $versement->reference_paiement ?? '') }}">
</div>

<div class="mb-3">
    <label>Observation</label>
    <textarea name="observation" class="form-control">{{ old('observation', $versement->observation ?? '') }}</textarea>
</div>
<div class="text-center">
            <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                <i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Mettre à jour
            </button>
        </div>
</form>

@endsection
           