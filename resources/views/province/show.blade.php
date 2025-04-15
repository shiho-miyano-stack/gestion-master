@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Détails de la province</h1>

    <div class="container">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Province</h5>
                <p class="card-text">{{ $province->Libelle }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('provinces.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"style="margin-right: 5px;"></i> Retour à la liste</a>
        </div>
    </div>
@endsection
