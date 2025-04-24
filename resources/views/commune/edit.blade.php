@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Modifier la commune</h1>

<div class="container">
    
    <form action="{{ route('communes.update', $commune) }}" method="POST">
        @csrf
        @method('PUT') <!-- Nous utilisons PUT pour mettre à jour la ressource -->

        <div class="form-group">
            <label for="Nom">Nom de la commune</label>
            <input type="text" name="Nom" id="Nom" class="form-control" value="{{ old('Nom', $commune->Nom) }}" required>
        </div>

        <div class="form-group">
            <label for="idProvince">Province</label>
            <select name="IdProv" id="IdProv" class="form-control" required>
                <option value="">Sélectionner une province</option>
                @foreach($provinces as $province)
                    <option value="{{ $province->Id }}" {{ $province->Libelle == old('Libelle', $commune->Libelle) ? 'selected' : '' }}>
                        {{ $province->Id }}
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
            <a href="{{ route('communes.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
    </div>
    </form>
</div>
@endsection
