@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Liste des provinces</h1>

    <div class="container">
        <a href="{{ route('provinces.create') }}" class="btn btn-primary mb-3">Ajouter une Province</a>
        <table  border=1 class="table table-bordered">
            <thead>
                <tr>
                    <th>Province</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($provinces as $province)
                    <tr>
                        <td>{{ $province->Libelle }}</td>
                        <td>
                            <a href="{{ route('provinces.show', $province->Id) }}" class="btn btn-info"><i class="bi bi-eye" style="margin-right: 5px;"></i>Voir</a>
                            <a href="{{ route('provinces.edit', $province->Id) }}" class="btn btn-warning"><i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Éditer</a>
                            <form action="{{ route('provinces.destroy', $province->Id) }}" method="POST" style="display:inline;">
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
