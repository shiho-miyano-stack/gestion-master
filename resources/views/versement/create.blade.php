@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Ajouter un versement</h1>

<div class="container">
    
    <form action="{{ route('versements.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="DateVers">Date du Versement</label>
            <input type="date" name="DateVers" id="DateVers" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Montant">Montant</label>
            <input type="number" step="0.01" name="Montant" id="Montant" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="IdSubv">Subvention</label>
            <select name="IdSubv" id="IdSubv" class="form-control" required>
                <option value="">Sélectionner une subvention</option>
                @foreach($subventions as $subvention)
                    <option value="{{ $subvention->Id }}">{{ $subvention->Type_Sub}}</option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                Enregistrer
            </button>
        </div>
        <div class="text-center">
            <a href="{{ route('versements.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
        </div>
    </form>
</div>
@endsection
