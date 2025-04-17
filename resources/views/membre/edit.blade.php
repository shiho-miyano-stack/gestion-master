<!-- resources/views/membre/edit.blade.php -->

@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Modifier le membre</h1>

    <div class="container">
        <form action="{{ route('membres.update', $membre->Id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="NomFr">Nom (Français)</label>
                <input type="text" name="NomFr" class="form-control" id="NomFr" value="{{ old('NomFr', $membre->NomFr) }}" required>
            </div>

            <div class="form-group">
                <label for="NomAr">Nom (Arabe)</label>
                <input type="text" name="NomAr" class="form-control" id="NomAr" value="{{ old('NomAr', $membre->NomAr) }}" required>
            </div>

            <div class="form-group">
                <label for="CNI">CNI</label>
                <input type="text" name="CNI" class="form-control" id="CNI" value="{{ old('CNI', $membre->CNI) }}" required>
            </div>

            <div class="form-group">
                <label for="Telephonne">Téléphone</label>
                <input type="text" name="Telephonne" class="form-control" id="Telephonne" value="{{ old('Telephonne', $membre->Telephonne) }}" required>
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="Email" class="form-control" id="Email" value="{{ old('Email', $membre->Email) }}" required>
            </div>

            <div class="form-group">
                <label for="Poste">Poste</label>
                <input type="text" name="Poste" class="form-control" id="Poste" value="{{ old('Poste', $membre->Poste) }}" required>
            </div>
            <div class="form-group">
            <label>ID Coopérative (optionnel)</label>
            <input type="number" name="id_coop" class="form-control">
        </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                    <i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Mettre à jour
                </button>
            </div>
            <div class="text-center">
                <a href="{{ route('membres.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
            </div>
        </form>
    </div>
@endsection
