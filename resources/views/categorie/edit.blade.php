@extends('layouts.app')

@section('content')
    <h1 style="text-align:center;">Modifier la catégorie</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('categories.update', $categorie) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Catégorie:</label>
        <input type="text" name="Libelle" value="{{ old('Libelle', $categorie->Libelle) }}" required>
        <br>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                <i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Mettre à jour
            </button>
        </div>
    </form>
    <div class="text-center">
        <a href="{{ route('categories.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
    </div>
@endsection
