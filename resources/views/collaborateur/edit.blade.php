@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Modifier le collaborateur</h1>

<div class="container">
    <form action="{{ route('collaborateurs.update', $collaborateur) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="NomFr" class="form-label">Nom (Fr)</label>
            <input type="text" class="form-control" name="NomFr" value="{{ $collaborateur->NomFr }}" required>
        </div>
        <div class="mb-3">
            <label for="NomAr" class="form-label">Nom (Ar)</label>
            <input type="text" class="form-control" name="NomAr" value="{{ $collaborateur->NomAr }}" required>
        </div>
        <div class="mb-3">
            <label for="CIN" class="form-label">CIN</label>
            <input type="text" class="form-control" name="CIN" value="{{ $collaborateur->CIN }}" required>
        </div>
        <div class="mb-3">
            <label for="Telephonne" class="form-label">Téléphone</label>
            <input type="text" class="form-control" name="Telephonne" value="{{ $collaborateur->Telephonne }}" required>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" name="Email" value="{{ $collaborateur->Email }}" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                <i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Mettre à jour
            </button>
        </div>
        <div class="text-center">
            <a href="{{ route('collaborateurs.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
    </div>
    </form>
</div>
@endsection

