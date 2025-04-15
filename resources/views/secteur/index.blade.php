@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Liste des secteurs</h1>

    <div class="container">
        <a href="{{ route('secteurs.create') }}" class="btn btn-primary mb-3">Ajouter un Secteur</a>
        <table border=1 class="table table-bordered">
            <thead>
                <tr>
                    <th>Secteur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($secteurs as $secteur)
                    <tr>
                        <td>{{ $secteur->Libelle }}</td>
                        <td>
                            <a href="{{ route('secteurs.show', $secteur) }}" class="btn btn-info"><i class="bi bi-eye" style="margin-right: 5px;"></i>Voir</a>
                            <a href="{{ route('secteurs.edit', $secteur) }}" class="btn btn-warning"><i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Éditer</a>
                            <form action="{{ route('secteurs.destroy', $secteur) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3" style="margin-right: 5px;"></i>Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
