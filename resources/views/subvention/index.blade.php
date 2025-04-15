@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Liste des subventions</h1>

<div class="container">
    <a href="{{ route('subventions.create') }}" class="btn btn-primary mb-3">Ajouter une Subvention</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table border=1 class="table table-bordered">
        <thead>
            <tr>
                
                <th>Type</th>
                <th>Montant</th>
                <th>Date Transfert</th>
                <th>Date Dépôt</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subventions as $subvention)
                <tr>
                   
                    <td>{{ $subvention->Type_Sub }}</td>
                    <td>{{ $subvention->Montant }}</td>
                    <td>{{ $subvention->DateTransfert }}</td>
                    <td>{{ $subvention->DateDepot }}</td>
                    <td>
                        <a href="{{ route('subventions.show', $subvention) }}" class="btn btn-info"><i class="bi bi-eye" style="margin-right: 5px;"></i>Voir</a>
                        <a href="{{ route('subventions.edit', $subvention) }}" class="btn btn-warning"><i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Éditer</a>
                        <form action="{{ route('subventions.destroy', $subvention) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')" style="margin-top: 20px; width: 100%; height:45px;border-radius: 10px;"><i class="bi bi-trash3" style="margin-right: 5px;"></i>Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
