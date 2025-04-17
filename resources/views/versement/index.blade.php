@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des versements</h1>
    <a href="{{ route('versements.create') }}" class="btn btn-primary mb-3">Ajouter un versement</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Montant</th>
                <th>Mode Paiement</th>
                <th>Référence</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($versements as $v)
            <tr>
                <td>{{ $v->DateVers }}</td>
                <td>{{ $v->Montant }}</td>
                <td>{{ $v->mode_paiement }}</td>
                <td>{{ $v->reference_paiement }}</td>
                <td>
                    <a href="{{ route('versements.show', $v->Id) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('versements.edit', $v->Id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('versements.destroy', $v->Id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce versement ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
