@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Liste des communes</h1>

<div class="container">
    <a href="{{ route('communes.create') }}" class="btn btn-primary mb-3">Ajouter une commune</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table border=1 class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Province</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($communes as $commune)
                <tr>
                    <td>{{ $commune->Libelle }}</td>
                    <td>{{ $commune->province->Libelle}}</td>
                    <td>
                        <a href="{{ route('communes.show', $commune) }}" class="btn btn-info"><i class="bi bi-eye" style="margin-right: 5px;"></i>Voir</a>
                        <a href="{{ route('communes.edit', $commune) }}" class="btn btn-warning"><i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Éditer</a>
                        <form action="{{ route('communes.destroy', $commune) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce login ?')"><i class="bi bi-trash3" style="margin-right: 5px;"></i>Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
