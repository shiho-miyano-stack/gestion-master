@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des versements</h1>
    <a href="{{ route('versements.create') }}" class="btn btn-primary mb-3">Ajouter un versement</a>
    <div class="container">
    
    <style>
    .search-bar {
        display: flex;
        max-width: 600px;
        margin: 20px auto;
        border-radius: 50px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .search-bar input[type="text"] {
        flex: 1;
        padding: 12px 20px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-right: none;
        border-radius: 50px 0 0 50px;
        outline: none;
        transition: all 0.3s ease-in-out;
    }

    .search-bar input[type="text"]:focus {
        border-color: #5c6bc0;
        box-shadow: 0 0 5px rgba(92, 107, 192, 0.5);
    }

    .search-bar button {
        padding: 12px 20px;
        background-color: #333;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 0 50px 50px 0;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .search-bar button:hover {
        background-color: #5c6bc0;
    }

    .search-bar input[type="text"]::placeholder {
        color: #aaa;
        font-style: italic;
    }
</style>

<!-- Barre de recherche pour les secteurs -->
<div class="position-relative">
    <form method="GET" action="{{ route('versements.index') }}" class="search-bar">
        <input 
            type="text" 
            name="search" 
            id="search" 
            value="{{ request('search') }}" 
            placeholder="Rechercher un versement..."
        >
        <button type="submit">
            <i class="fa fa-search"></i>
        </button>
    </form>
</div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Montant</th>
                <th>Mode Paiement</th>
                <th>Référence</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($versements as $v)
            <tr>
                <td>{{ $v->DateVers }}</td>
                <td>{{ $v->Montant }}</td>
                <td>{{ $v->mode_paiement }}</td>
                <td>{{ $v->reference_paiement }}</td>
                <td>
                    <a href="{{ route('versements.show', $v->Id) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('versements.edit', $v->Id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('versements.destroy', $v->Id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce versement ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
    <nav>
        <ul class="pagination">
            @for ($i = 1; $i <= $versements->lastPage(); $i++)
                <li class="page-item {{ $i == $versements->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $versements ->url($i) }}{{ request()->has('search') ? '&search=' . request('search') : '' }}">
                        {{ $i }}
                    </a>
                </li>
            @endfor
        </ul>
    </nav>
</div>
</div>
@endsection
