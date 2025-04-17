@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Coopératives</h1>
    <a href="{{ route('cooperatives.create') }}" class="btn btn-primary mb-3">Ajouter une Coopérative</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Nom (FR)</th>
                <th>Commune</th>
                <th>Secteur</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($cooperatives as $coop)
            <tr>
                <td>{{ $coop->NumCop }}</td>
                <td>{{ $coop->NomFr }}</td>
                <td>{{ $coop->commune->Libelle ?? 'N/A' }}</td>
                <td>{{ $coop->secteur->Libelle ?? $coop->Secteur }}</td>
                <td>{{ $coop->categorie->Libelle ?? $coop->Categorie }}</td>
                <td>
                    <a href="{{ route('cooperatives.show', $coop->Id) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('cooperatives.edit', $coop->Id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('cooperatives.destroy', $coop->Id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
