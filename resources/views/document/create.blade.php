@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un Document Joint</h2>

    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="demande_id">Demande de subvention :</label>
            <select name="demande_id" id="demande_id" class="form-control" required>
                <option value="">-- Sélectionner une demande --</option>
                @foreach ($demandes as $demande)
                    <option value="{{ $demande->Id }}">
                        Demande #{{ $demande->Id }} - Subvention #{{ $demande->IdSubv }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="document">Fichier</label>
            <input type="file" name="document" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('documents.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
