@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Ajouter une demande de subvention</h1>

<div class="container">

    <form action="{{ route('demande_subventions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


  

        <div class="mb-3">
            <label >Statut de demande</label>
            <select name="Satut" class="form-control" required>
                    <option value="">Séléctionner le statut de demande</option>
                    <option value="accepte">Accepté</option>
                    <option value="refuse">Refusé</option>
                    <option value="encours">Encours de traitement</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Coopérative</label>
            <select name="IdCoop" class="form-control" required>
                <option value="">Séléctionner la coopérative</option>
                @foreach($cooperatives as $coop)
                    <option value="{{ $coop->Id }}">{{ $coop->NomFr }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Subvention</label>
            <select name="IdSubv" class="form-control" required>
                @foreach($subventions as $subv)
                    <option value="{{ $subv->Id }}">{{ $subv->Id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Observation</label>
            <textarea name="Observation" class="form-control"></textarea>
        </div>


        <div class="form-group mb-3">
        <label for="fichier">Fichier :</label>
        <input type="file" name="fichier" class="form-control">
    </div>

    
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                Enregistrer
            </button>
        </div>
        <div class="text-center">
            <a href="{{ route('demande_subventions.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
        </div>
    </form>
</div>
@endsection
