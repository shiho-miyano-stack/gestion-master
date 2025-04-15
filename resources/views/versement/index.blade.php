@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Liste des versements</h1>

<div class="container">
    <a href="{{ route('versements.create') }}" class="btn btn-primary mb-3">Ajouter un Versement</a>

    <table border=1 class="table table-bordered">
        <thead>
            <tr>
                <th>Date de Versement</th>
                <th>Montant</th>
                <th>Subvention</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($versements as $versement)
                <tr>
                    <td>{{ $versement->DateVers }}</td>
                    <td>{{ $versement->Montant }}</td>
                    <td>{{ $versement->subvention->Id }}</td>
                    <td>
                        <a href="/versements/{{( $versement->id) }}" class="btn btn-info">Voir</a>
                        <a href="/versements/{{( $versement->id) }}" class="btn btn-warning">Éditer</a>
                        <form action="/versements/{{( $versement->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" style="margin-top: 20px; width: 100%; height:45px;border-radius: 10px;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
