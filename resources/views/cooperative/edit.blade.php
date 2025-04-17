@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Modifier la Coopérative</h1>
    <form action="{{ route('cooperatives.update', $cooperative->Id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
    <div class="col-md-6 mb-3">
        <label>Numéro Coopérative</label>
        <input type="number" name="NumCop" class="form-control" value="{{ old('NumCop', $cooperative->NumCop ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Nom Français</label>
        <input type="text" name="NomFr" class="form-control" required value="{{ old('NomFr', $cooperative->NomFr ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Nom Arabe</label>
        <input type="text" name="NomAr" class="form-control" required value="{{ old('NomAr', $cooperative->NomAr ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Commune</label>
        <select name="IdComm" class="form-control" required>
            <option value="">-- Sélectionner --</option>
            @foreach($communes as $commune)
                <option value="{{ $commune->Id }}" {{ old('IdComm', $cooperative->IdComm ?? '') == $commune->Id ? 'selected' : '' }}>
                    {{ $commune->Libelle }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Secteur</label>
        <select name="Secteur" class="form-control">
            <option value="">-- Sélectionner --</option>
            @foreach($secteurs as $secteur)
                <option value="{{ $secteur->Id }}" {{ old('Secteur', $cooperative->Secteur ?? '') == $secteur->Id ? 'selected' : '' }}>
                    {{ $secteur->Libelle }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Catégorie</label>
        <select name="Categorie" class="form-control">
            <option value="">-- Sélectionner --</option>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->Id }}" {{ old('Categorie', $cooperative->Categorie ?? '') == $categorie->Id ? 'selected' : '' }}>
                    {{ $categorie->Libelle }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Nombre Membres</label>
        <input type="number" name="NbrMem" class="form-control" value="{{ old('NbrMem', $cooperative->NbrMem ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Nombre Collaborateurs</label>
        <input type="number" name="NbrColl" class="form-control" value="{{ old('NbrColl', $cooperative->NbrColl ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Date de Création</label>
        <input type="date" name="DateCreation" class="form-control" value="{{ old('DateCreation', $cooperative->DateCreation ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Déjà Bénéficié</label>
        <select name="DejaBeneficie" class="form-control">
            <option value="0" {{ old('DejaBeneficie', $cooperative->DejaBeneficie ?? '') == '0' ? 'selected' : '' }}>Non</option>
            <option value="1" {{ old('DejaBeneficie', $cooperative->DejaBeneficie ?? '') == '1' ? 'selected' : '' }}>Oui</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Adresse</label>
        <input type="text" name="Adresse" class="form-control" value="{{ old('Adresse', $cooperative->Adresse ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Informations</label>
        <textarea name="Informations" class="form-control">{{ old('Informations', $cooperative->Informations ?? '') }}</textarea>
    </div>
</div>
<button type="submit" class="btn btn-primary">Mettre à jour</button>
<div class="text-center">
<a href="{{ route('cooperatives.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>

    </form>
</div>
@endsection