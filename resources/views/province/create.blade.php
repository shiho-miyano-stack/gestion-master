@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Ajouter une Province</h1>

    <div class="container">

        <form action="{{ route('provinces.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="Libelle">Nom du province</label>
                <input type="text" name="Libelle" id="Libelle" class="form-control" value="{{ old('Libelle') }}" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                    Enregistrer
                </button>
            </div>
            <div class="text-center">
                <a href="{{ route('provinces.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
        </div>
        </form>
    </div>
@endsection
