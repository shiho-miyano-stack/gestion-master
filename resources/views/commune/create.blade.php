@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Ajouter une commune</h1>

<div class="container">
    <form action="/communes" method="POST">
        @csrf
        <div class="form-group">
            <label for="Nom">Commune</label>
            <input type="text" name="Nom" id="Nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="IdProv">Province</label>
            <select name="IdProv" id="IdProv" class="form-control" required>
                <option value="">Sélectionner une province</option>
                @foreach($provinces as $province)
                    <option value="{{ $province->Id }}">{{ $province->Libelle }}</option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                Enregistrer
            </button>
        </div>
        <div class="text-center">
            <a href="{{ route('communes.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
    </div>
    </form>
</div>
@endsection
