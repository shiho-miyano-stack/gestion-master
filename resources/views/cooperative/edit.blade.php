@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Modifier la coopérative</h1>

<div class="container">
    
    <form action="{{ route('cooperatives.update', $cooperative) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="NumCop">NumCop</label>
            <input type="number" class="form-control" id="NumCop" name="NumCop" value="{{ old('NumCop', $cooperative->NumCop) }}" required>
        </div>
        <div class="form-group">
            <label for="NomFr">Nom en Français</label>
            <input type="text" class="form-control" id="NomFr" name="NomFr" value="{{ old('NomFr', $cooperative->NomFr) }}" required>
        </div>

        <div class="form-group">
            <label for="NomAr">Nom en Arabe</label>
            <input type="text" class="form-control" id="NomAr" name="NomAr" value="{{ old('NomAr', $cooperative->NomAr) }}">
        </div>

        <div class="form-group">
            <label for="Telephonne">Téléphone</label>
            <input type="text" class="form-control" id="Telephonne" name="Telephonne" value="{{ old('Telephonne', $cooperative->Telephonne) }}">
        </div>

        <div class="form-group">
            <label for="NumInscrip">Numéro d'Inscription</label>
            <input type="text" class="form-control" id="NumInscrip" name="NumInscrip" value="{{ old('NumInscrip', $cooperative->NumInscrip) }}">
        </div>

        <div class="form-group">
            <label for="DateCreation">Date de Création</label>
            <input type="date" class="form-control" id="DateCreation" name="DateCreation" value="{{ old('DateCreation', $cooperative->DateCreation) }}">
        </div>

        <div class="form-group">
            <label for="NumAnalytique">Numéro Analytique</label>
            <input type="text" class="form-control" id="NumAnalytique" name="NumAnalytique" value="{{ old('NumAnalytique', $cooperative->NumAnalytique) }}">
        </div>

        <div class="form-group">
            <label for="Secteur">Secteur</label>
            <input type="text" class="form-control" id="Secteur" name="Secteur" value="{{ old('Secteur', $cooperative->Secteur) }}">
        </div>

        <div class="form-group">
            <label for="Categorie">Catégorie</label>
            <input type="text" class="form-control" id="Categorie" name="Categorie" value="{{ old('Categorie', $cooperative->Categorie) }}">
        </div>

        <div class="form-group">
            <label for="Adresse">Adresse</label>
            <input type="text" class="form-control" id="Adresse" name="Adresse" value="{{ old('Adresse', $cooperative->Adresse) }}">
        </div>

        <div class="form-group">
            <label for="Informations">Informations</label>
            <textarea class="form-control" id="Informations" name="Informations">{{ old('Informations', $cooperative->Informations) }}</textarea>
        </div>

        <div class="form-group">
            <label for="DejaBeneficie">Déjà Bénéficié</label>
            <select class="form-control" id="DejaBeneficie" name="DejaBeneficie">
                <option value="1" {{ $cooperative->DejaBeneficie == 1 ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ $cooperative->DejaBeneficie == 0 ? 'selected' : '' }}>Non</option>
            </select>
        </div>

        <div class="form-group">
            <label for="IdComm">Responsable</label>
            <select class="form-control" id="IdComm" name="IdResp">
                @foreach ($collaborateurs as $collaborateur)
                    <option value="{{ $collaborateur->IdColl }}" {{ $cooperative->IdColl== $collaborateur->Id ? 'selected' : '' }}>
                        {{ $collaborateur->Id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="IdComm">Commune</label>
            <select class="form-control" id="IdComm" name="IdComm">
                @foreach ($communes as $commune)
                    <option value="{{ $commune->IdComm }}" {{ $cooperative->IdComm == $commune->Id ? 'selected' : '' }}>
                        {{ $commune->Libelle }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                <i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Mettre à jour
            </button>
        </div>
        <div class="text-center">
            <a href="{{ route('cooperatives.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
    </div>
    </form>
</div>
@endsection