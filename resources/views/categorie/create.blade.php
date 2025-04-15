@extends('layouts.app')

@section('content')
    <h1 style="text-align:center;">Ajouter une catégorie</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
    
        <div class="form-group">
            <label for="Libelle">Catégorie</label>
            <input type="text" name="Libelle" id="Libelle" class="form-control" value="{{ old('Libelle') }}" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                    Enregistrer
                </button>
            </div>
        
    </form>
    <div class="text-center">
        <a href="{{ route('categories.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
</div>
    
@endsection
