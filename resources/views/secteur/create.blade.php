@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Ajouter un secteur</h1>

    <div class="container">
        <form action="{{ route('secteurs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                
                <label for="Libelle">Secteur</label>
                <input type="text" class="form-control" name="Libelle" id="Libelle" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                    Enregistrer
                </button>
            </div>    
            <div class="text-center">
                <a href="{{ route('secteurs.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
            </div>    
        </form>
    </div>
@endsection
