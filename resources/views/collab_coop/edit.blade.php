@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier une relation Collaborateur - Coopérative</h2>

    <form action="{{ route('collab_coop.update', $collabCoop) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_coll" class="form-label">Collaborateur</label>
            <select name="id_coll" id="id_coll" class="form-control" required>
                @foreach($collaborateurs as $collab)
                    <option value="{{ $collab->id }}" {{ $collab->id == $collabCoop->id_coll ? 'selected' : '' }}>
                        {{ $collab->Id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_coop" class="form-label">Coopérative</label>
            <select name="id_coop" id="id_coop" class="form-control" required>
                @foreach($cooperatives as $coop)
                    <option value="{{ $coop->id }}" {{ $coop->id == $collabCoop->id_coop ? 'selected' : '' }}>
                        {{ $coop->Id }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('collab_coop.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
