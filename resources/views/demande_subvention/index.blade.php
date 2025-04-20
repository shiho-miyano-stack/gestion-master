@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Liste des demandes de subvention</h1>

<div class="container">
    <a href="{{ route('demande_subventions.create') }}" class="btn btn-primary mb-3">Ajouter une demande</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table  border=1 class="table table-bordered">
        <thead>
            <tr>
                <th>Statut</th>
                <th>Observation</th>
                <th>Coopérative</th>
                <th>Subvention</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demandes as $demande)
                <tr>
                    <td>{{ $demande->Satut }}</td>
                    <td>{{ $demande->Observation }}</td>
                    <td>{{ $demande->cooperative->Id ?? 'Non défini' }}</td>
                    <td>{{ $demande->subvention->Id  }}</td>
                    <td>
                        <a href="{{ route('demande_subventions.show', $demande) }}" class="btn btn-info"><i class="bi bi-eye" style="margin-right: 5px;"></i>Voir</a>
                        <a href="{{ route('demande_subventions.edit', $demande) }}" class="btn btn-warning"><i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Éditer</a>
                        
                        <a href="{{ Storage::url($demande->fichier) }}" class="btn btn-primary btn-sm" download="{{ basename($demande->fichier) }}">Télécharger</a>
                        

                        <form action="{{ route('demande_subventions.destroy', $demande) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')"><i class="bi bi-trash3" style="margin-right: 5px;"></i>Supprimer</button>
                        </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
