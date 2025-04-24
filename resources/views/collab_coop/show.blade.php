@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails de la relation</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Collaborateur :</strong> {{ $collabCoop->collaborateur->Id ?? 'Non définie' }}</p>
            <p><strong>Coopérative :</strong> {{ $collabCoop->cooperative->Id ?? 'Non définie' }}</p>
            <p><strong>Date de création :</strong> {{ $collabCoop->created_at }}</p>
        </div>
    </div>

    <a href="{{ route('collab_coop.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection
