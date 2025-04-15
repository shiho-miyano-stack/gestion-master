@extends('layouts.app')

@section('content')
    <h1 style="text-align:center;">Liste des catégories</h1>

  

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter une catégorie</a>
        <table  border=1 class="table table-bordered">
            <thead>
                <tr>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->Libelle }}</td>
                        <td>
                            <a href="{{ route('categories.show', $categorie->Id) }}" class="btn btn-info"><i class="bi bi-eye" style="margin-right: 5px;"></i>Voir</a>
                            <a href="{{ route('categories.edit', $categorie->Id) }}" class="btn btn-warning"><i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Éditer</a>
                            <form action="{{ route('categories.destroy', $categorie->Id) }}" method="POST" style="display:inline;">
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
