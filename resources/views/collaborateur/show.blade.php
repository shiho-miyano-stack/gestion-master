@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Détails du collaborateur</h1>

<div class="container">
    <div class="card p-3">
        <p><strong>Nom (Français):</strong> {{ $collaborateur->NomFr }}</p>
        <p><strong>Nom (Arabe):</strong> {{ $collaborateur->NomAr }}</p>
        <p><strong>CIN:</strong> {{ $collaborateur->CIN }}</p>
        <p><strong>Téléphone:</strong> {{ $collaborateur->Telephonne }}</p>
        <p><strong>Email:</strong> {{ $collaborateur->Email }}</p>
    </div>
    <div class="mt-3">
        <a href="{{ route('collaborateurs.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"style="margin-right: 5px;"></i> Retour à la liste</a>
    </div>
</div>
@endsection

