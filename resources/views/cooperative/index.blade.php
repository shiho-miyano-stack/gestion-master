@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cooperative.css') }}">
@endsection
@section('content')
<h1 style="text-align:center;">Liste des coopératives</h1>

<div class="container">

    <a href="{{ route('cooperatives.create') }}" class="btn btn-primary mb-3">Ajouter une Coopérative</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table border=1 class="table table-bordered">
        <thead>
                <th>Numéro coopérative</th>
                <th>Nom en français</th>
                <th>Nom en Arabe</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cooperatives as $coop)
                <tr>

                    <td>{{ $coop->NumCop }}</td>
                    <td>{{ $coop->NomFr ?? '-' }}</td>
                    <td>{{ $coop->NomAr?? '-' }}</td>
                    <td>{{ $coop->Telephonne ?? '-' }}</td>
                    <td>{{ $coop->Adresse?? '-' }}</td>
                    <td>
                        <a href="{{ route('cooperatives.show', $coop->Id) }}" class="btn btn-info"><i class="bi bi-eye" style="margin-right: 5px;"></i>Voir</a>
                        <a href="{{ route('cooperatives.edit', $coop->Id) }}" class="btn btn-warning"><i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Éditer</a>
                        <form action="{{ route('cooperatives.destroy', $coop->Id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Supprimer cette coopérative ?')"><i class="bi bi-trash3" style="margin-right: 5px;"></i>Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
