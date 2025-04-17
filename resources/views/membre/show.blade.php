<!-- resources/views/membre/show.blade.php -->

@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Détails du membre</h1>

    <div class="container">
        <table class="table">
        
            <tr>
                <th>Nom (Français)</th>
                <td>{{ $membre->NomFr }}</td>
            </tr>
            <tr>
                <th>Nom (Arabe)</th>
                <td>{{ $membre->NomAr }}</td>
            </tr>
            <tr>
                <th>CNI</th>
                <td>{{ $membre->CNI }}</td>
            </tr>
            <tr>
                <th>Téléphone</th>
                <td>{{ $membre->Telephonne }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $membre->Email }}</td>
            </tr>
            <tr>
                <th>Poste</th>
                <td>{{ $membre->Poste }}</td>
            </tr>
            <li class="list-group-item"><strong>ID Coopérative :</strong> {{ $membre->id_coop }}</li>
        </table>
        <div class="mt-3">
            <a href="{{ route('membres.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"style="margin-right: 5px;"></i> Retour à la liste</a>
        </div>
    </div>
@endsection
