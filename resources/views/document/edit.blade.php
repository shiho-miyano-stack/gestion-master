@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier un document joint</h2>

    <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <  <select name="demande_id" class="form-control" required>
    <option value="">-- Sélectionner une demande --</option>
    @foreach ($demandes as $demande)
        <option value="{{ $demande->Id }}" {{ $document->demande_id == $demande->Id ? 'selected' : '' }}>
            Demande #{{ $demande->Id }} - Subvention #{{ $demande->IdSubv }}
        </option>
    @endforeach
</select>

        <div class="form-group">
            <label for="document">Remplacer le fichier (optionnel)</label>
            <input type="file" name="document" class="form-control">
            @if ($document->nom_fichier)
                <p>Fichier actuel : <strong>{{ $document->nom_fichier }}</strong></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('documents.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
