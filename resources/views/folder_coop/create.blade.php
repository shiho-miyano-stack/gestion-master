@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($folder) ? 'Modifier' : 'Ajouter' }} un dossier</h2>

    <form action="{{ isset($folder) ? route('folder_coops.update', $folder->Id) : route('folder_coops.store') }}" method="POST">
        @csrf
        @if(isset($folder)) @method('PUT') @endif

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="Nom" class="form-control" value="{{ $folder->Nom ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label>Taille</label>
            <input type="number" name="Size" class="form-control" value="{{ $folder->Size ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label>Observation</label>
            <textarea name="Observation" class="form-control">{{ $folder->Observation ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>Coopérative</label>
            <select name="IdCoop" class="form-control" required>
                @foreach($cooperatives as $coop)
                    <option value="{{ $coop->Id }}" 
                        {{ isset($folder) && $coop->Id == $folder->IdCoop ? 'selected' : '' }}>
                        {{ $coop->NomFr }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">{{ isset($folder) ? 'Mettre à jour' : 'Enregistrer' }}</button>
    </form>
</div>
@endsection
