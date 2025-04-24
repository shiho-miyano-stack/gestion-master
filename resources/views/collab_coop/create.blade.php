@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter une relation Collaborateur - Coopérative</h2>

    <form action="{{ route('collab_coop.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_coll" class="form-label">Collaborateur</label>
            <select name="id_coll" id="id_coll" class="form-control" required>
                <option value="">Sélectionner un collaborateur</option>
                @foreach($collaborateurs as $collab)
                    <option value="{{ $collab->id }}">{{ $collab->Id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_coop" class="form-label">Coopérative</label>
            <select name="id_coop" id="id_coop" class="form-control" required>
                <option value="">Sélectionner une coopérative</option>
                @foreach($cooperatives as $coop)
                    <option value="{{ $coop->id }}">{{ $coop->Id }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('collab_coop.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
