@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Ajouter une subvention</h1>

<div class="container">

    <form action="{{ route('subventions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Type de Subvention</label>
            <select name="Type_Sub" class="form-control" required>
                <option value="">Sélectionner le type</option>
                <option value="subNature">Subvention en nature</option>
                <option value="subFinanciere">subvention financière</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Montant</label>
            <input type="number" name="Montant" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date de Transfert</label>
            <input type="date" name="DateTransfert" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date de Dépôt</label>
            <input type="date" name="DateDepot" class="form-control" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                Enregistrer
            </button>
        </div>      
        <div class="text-center">
            <a href="{{ route('subventions.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
    </div>  
    </form>
</div>
@endsection
