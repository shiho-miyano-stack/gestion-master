@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Modifier un secteur</h1>

    <div class="container">
        <form action="{{ route('secteurs.update', $secteur) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Libelle">Secteur</label>
                <input type="text" class="form-control" name="Libelle" id="Libelle" value="{{ $secteur->Libelle }}" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                    <i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Mettre à jour
                </button>
            </div>
            <div class="text-center">
                <a href="{{ route('secteurs.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
            </div>
            
        </form>
    </div>
@endsection
