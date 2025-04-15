@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Modifier un versement</h1>

<div class="container">

    <form action="{{ route('versements.update', $versement) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="DateVers">Date du Versement</label>
            <input type="date" name="DateVers" id="DateVers" class="form-control" value="{{ $versement->DateVers }}" required>
        </div>

        <div class="form-group">
            <label for="Montant">Montant</label>
            <input type="number" step="0.01" name="Montant" id="Montant" class="form-control" value="{{ $versement->Montant }}" required>
        </div>

        <div class="form-group">
            <label for="IdSubv">Subvention</label>
            <select name="IdSubv" id="IdSubv" class="form-control" required>
                <option value="">Sélectionner une subvention</option>
                @foreach($subventions as $subvention)
                     
                <option value="{{ $subvention->Id }}" {{ $subvention->Id == old('Id', $versement->Id) ? 'selected' : '' }}>
                        {{ $subvention->Id }}</option>
                @endforeach
            </select>
           