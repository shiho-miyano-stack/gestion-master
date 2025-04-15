@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Modifier une subvention</h1>

<div class="container">

    <form action="{{ route('subventions.update', $subvention) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Type de Subvention</label>
            <input type="text" name="Type_Sub" class="form-control" value="{{ $subvention->Type_Sub }}" required>
        </div>

        <div class="mb-3">
            <label>Montant</label>
            <input type="number" name="Montant" step="0.01" class="form-control" value="{{ $subvention->Montant }}" required>
        </div>

        <div class="mb-3">
            <label>Date de Transfert</label>
            <input type="date" name="DateTransfert" class="form-control" value="{{ $subvention->DateTransfert }}" required>
        </div>

        <div class="mb-3">
            <label>Date de Dépôt</label>
            <input type="date" name="DateDepot" class="form-control" value="{{ $subvention->DateDepot }}" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                <i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Mettre à jour
            </button>
        </div>
        <div class="text-center">
            <a href="{{ route('subventions.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
    </div>
    </form>
</div>
@endsection
