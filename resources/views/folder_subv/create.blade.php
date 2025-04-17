<!-- resources/views/folder_subv/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Ajouter un Dossier</h1>

    <form action="{{ route('folder_subvs.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="Nom">Nom du Dossier</label>
            <input type="text" name="Nom" class="form-control" value="{{ old('Nom') }}" required>
        </div>

        <div class="form-group">
            <label for="Size">Taille (Mo)</label>
            <input type="number" name="Size" class="form-control" value="{{ old('Size') }}" step="0.1">
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
        <div class="form-group">
            <label for="Observation">Observation</label>
            <textarea name="Observation" class="form-control" rows="4">{{ old('Observation') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Ajouter</button>
    </form>
</div>
@endsection
