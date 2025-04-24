@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Coopératives</h1>
    <a href="{{ route('cooperatives.create') }}" class="btn btn-primary mb-3">Ajouter une Coopérative</a>

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
    <div class="position-relative">
        <form method="GET" action="{{ route('cooperatives.index') }}" class="search-bar">
            <input 
                type="text" 
                name="search" 
                id="search" 
                value="{{ request('search') }}" 
                placeholder="Rechercher une coopérative..."
            >
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>

        <!-- Liste des suggestions -->
        <div id="suggestions" class="suggestions" style="display: none;"></div>
    </div>

    <!-- Table des coopératives -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom (AR)</th>
                <th>Nom (FR)</th>
                <th>Commune</th>
                <th>Secteur</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($cooperatives as $coop)
            <tr>
                <td>{{ $coop->NomAr }}</td>
                <td>{{ $coop->NomFr }}</td>
                <td>{{ $coop->commune->Libelle ?? 'N/A' }}</td>
                <td>{{ $coop->secteur->Libelle ?? $coop->Secteur }}</td>
               
                <td>
                    <a href="{{ route('cooperatives.show', $coop->Id) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('cooperatives.edit', $coop->Id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('cooperatives.destroy', $coop->Id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search').on('input', function() {
            var query = $(this).val(); // Récupère la valeur de la recherche

            if (query.length > 0) {
                $.ajax({
                    url: "{{ route('cooperatives.index') }}", // La route qui renvoie les résultats de recherche
                    type: "GET",
                    data: {
                        search: query
                    },
                    success: function(data) {
                        var suggestions = data.cooperatives; // Récupérer les résultats de recherche
                        var suggestionList = $('#suggestions');
                        suggestionList.empty(); // Vider les anciennes suggestions

                        if (suggestions.length > 0) {
                            suggestionList.show(); // Afficher la liste des suggestions
                            $.each(suggestions, function(index, coop) {
                                suggestionList.append(
                                    '<a href="/cooperatives/' + coop.Id + '" class="list-group-item list-group-item-action">' +
                                        coop.NomFr + ' - ' 
                                    '</a>'
                                );
                            });
                        } else {
                            suggestionList.hide(); // Masquer la liste si aucune suggestion
                        }
                    }
                });
            } else {
                $('#suggestions').hide(); // Masquer les suggestions si la barre de recherche est vide
            }
        });

        $(document).on('click', '.list-group-item', function() {
            var selected = $(this).text(); // Récupère le texte de la suggestion
            $('#search').val(selected); // Remplir la barre de recherche avec la suggestion
            $('#suggestions').hide(); // Masquer les suggestions après sélection
        });
    });
</script>
@endsection

