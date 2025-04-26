@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Liste des subventions</h1>

<div class="container">
    <a href="{{ route('subventions.create') }}" class="btn btn-primary mb-3">Ajouter une Subvention</a>
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
    <form method="GET" action="{{ route('subventions.index') }}" class="search-bar">
        <input 
            type="text" 
            name="search" 
            id="search" 
            value="{{ request('search') }}" 
            placeholder="Rechercher une subventions..."
        >
        <button type="submit">
            <i class="fa fa-search"></i>
        </button>
    </form>
</div>

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
    <div class="d-flex justify-content-center mt-4">
    <nav>
        <ul class="pagination">
            @for ($i = 1; $i <= $subventions->lastPage(); $i++)
                <li class="page-item {{ $i == $subventions->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $subventions ->url($i) }}{{ request()->has('search') ? '&search=' . request('search') : '' }}">
                        {{ $i }}
                    </a>
                </li>
            @endfor
        </ul>
    </nav>
</div>
</div>
@endsection
