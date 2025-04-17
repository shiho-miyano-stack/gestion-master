@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier un Folder Subv</h1>

        <form action="{{ route('folder_subvs.update', $folder) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="Nom">Nom</label>
                <input type="text" class="form-control" id="Nom" name="Nom" value="{{ $folder->Nom }}" required>
            </div>

            <div class="form-group">
                <label for="Size">Taille</label>
                <input type="number" class="form-control" id="Size" name="Size" value="{{ $folder->Size }}" required>
            </div>
            <div>
            <label for="idSubv">Subvention</label>
            <select name="idSubv" id="idSubv" class="form-control" required>
                    @foreach($subventions as $subvention)
                        <option value="{{ $subvention->id }}">{{ $subvention->Type_Sub }}</option>
                    @endforeach
                </select>
             </div>

            <div class="form-group">
                <label for="Observation">Observation</label>
                <textarea class="form-control" id="Observation" name="Observation">{{ $folder->Observation }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
