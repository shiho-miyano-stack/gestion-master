@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Modifier la province</h1>

    <div class="container">

        <form action="{{ route('provinces.update', $province->Id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="Libelle">Province</label>
                <input type="text" name="Libelle" id="Libelle" class="form-control" value="{{ old('Libelle', $province->Libelle) }}" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                    <i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Mettre à jour
                </button>
            </div>
            <div class="text-center">
                    <a href="{{ route('provinces.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
            </div>
        </form>
    </div>
@endsection
