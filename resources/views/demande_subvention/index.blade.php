@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Liste des demandes de subvention</h1>

<div class="container">
    <a href="{{ route('demande_subventions.create') }}" class="btn btn-primary mb-3">Ajouter une demande</a>
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

        /* Style des suggestions */
        .suggestions {
            position: absolute;
            z-index: 1000;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        .suggestions a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        .suggestions a:hover {
            background-color: #f0f0f0;
        }
    </style>

    <!-- Formulaire de recherche -->
   <!-- Barre de recherche pour les demandes de subvention -->
<div class="position-relative">
    <form method="GET" action="{{ route('demande_subventions.index') }}" class="search-bar">
        <input 
            type="text" 
            name="search" 
            id="search" 
            value="{{ request('search') }}" 
            placeholder="Rechercher une demande par statut..."
        >
        <button type="submit">
            <i class="fa fa-search"></i>
        </button>
    </form>
</div>


        <!-- Liste des suggestions -->
        <div id="suggestions" class="suggestions" style="display: none;"></div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table  border=1 class="table table-bordered">
        <thead>
            <tr>
                <th>Statut</th>
                <th>Observation</th>
                <th>Coopérative</th>
                <th>Subvention</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demandes as $demande)
                <tr>
                    <td>{{ $demande->Satut }}</td>
                    <td>{{ $demande->Observation }}</td>
                    <td>{{ $demande->cooperative->Id ?? 'Non défini' }}</td>
                    <td>{{ $demande->subvention->Id  }}</td>
                    <td>
                        <a href="{{ route('demande_subventions.show', $demande) }}" class="btn btn-info"><i class="bi bi-eye" style="margin-right: 5px;"></i>Voir</a>
                        <a href="{{ route('demande_subventions.edit', $demande) }}" class="btn btn-warning"><i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Éditer</a>
                        
                        <a href="{{ Storage::url($demande->fichier) }}" class="btn btn-primary btn-sm" download="{{ basename($demande->fichier) }}">Télécharger</a>
                        

                        <form action="{{ route('demande_subventions.destroy', $demande) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')"><i class="bi bi-trash3" style="margin-right: 5px;"></i>Supprimer</button>
                        </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <nav>
    <ul class="pagination">
        @for ($i = 1; $i <= $demandes->lastPage(); $i++)
            <li class="page-item {{ $i == $demandes->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $demandes->url($i) }}{{ request()->has('search') ? '&search=' . request('search') : '' }}">
                    {{ $i }}
                </a>
            </li>
        @endfor
    </ul>
</nav>


</div>
@endsection
