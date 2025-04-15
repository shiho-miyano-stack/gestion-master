@extends('layouts.app') <!-- adapte selon ton layout -->

@section('content')
<h1 style="text-align:center;">Liste des collaborateurs</h1>

<div class="container mt-4">
    <a href="{{ route('collaborateurs.create') }}" class="btn btn-primary mb-3">Ajouter un collaborateur</a>

    <table border=1 class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nom (Fr)</th>
                <th>Nom (Ar)</th>
                <th>CIN</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collaborateurs as $collaborateur)
                <tr>
                    <td>{{ $collaborateur->NomFr }}</td>
                    <td>{{ $collaborateur->NomAr }}</td>
                    <td>{{ $collaborateur->CIN }}</td>
                    <td>{{ $collaborateur->Telephonne }}</td>
                    <td>{{ $collaborateur->Email }}</td>
                    <td>
                        <a href="{{ route('collaborateurs.show', $collaborateur) }}" class="btn btn-info"><i class="bi bi-eye" style="margin-right: 5px;"></i>Voir</a>
                        <a href="{{ route('collaborateurs.edit', $collaborateur) }}" class="btn btn-warning"><i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Éditer</a>
                        <form action="{{ route('collaborateurs.destroy', $collaborateur) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ce collaborateur ?')"><i class="bi bi-trash3" style="margin-right: 5px;"></i>Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

