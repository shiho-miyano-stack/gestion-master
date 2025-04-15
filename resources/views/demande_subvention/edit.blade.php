@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Modifier la demande</h1>

<div class="container">

    <form action="{{ route('demande_subventions.update', $demande->Id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Statut</label>
            <input type="text" name="Statut" class="form-control" value="{{ $demande->Statut }}" required>
        </div>

        <div class="mb-3">
            <label>Observation</label>
            <textarea name="Observation" class="form-control">{{ $demande->Observation }}</textarea>
        </div>

        <div class="mb-3">
            <label>Coopérative</label>
            <select name="IdCoop" class="form-control" required>
                @foreach($cooperatives as $coop)
                    <option value="{{ $coop->Id }}" {{ $coop->Id == $demande->Id ? 'selected' : '' }}>
                        {{ $coop->NomFr }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Subvention</label>
            <select name="IdSubv" class="form-control" required>
                @foreach($subventions as $subv)
                    <option value="{{ $subv->Id }}" {{ $subv->Id == $demande->Type_Sub ? 'selected' : '' }}>
                        {{ $subv->Type_Sub }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                <i class="bi bi-pencil-square" style="margin-right: 5px;"></i>Mettre à jour
            </button>
        </div>
        <div class="text-center">
            <a href="{{ route('demande_subventions.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
    </div>
    </form>
</div>
@endsection

