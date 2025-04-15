@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un Folder Subv</h1>

        <form action="{{ route('folder_subvs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Nom">Nom</label>
                <input type="text" class="form-control" id="Nom" name="Nom" required>
            </div>
            <div class="form-group">
                <label for="Size">Taille</label>
                <input type="number" class="form-control" id="Size" name="Size" required>
            </div>
            <label for="idSubv">Subvention</label>
                <select name="idSubv" id="idSubv" class="form-control" required>
                    @foreach($subventions as $subvention)
                        <option value="{{ $subvention->id }}">{{ $subvention->Id }}</option>
                    @endforeach
                </select>
            <div class="form-group">
                <label for="Observation">Observation</label>
                <textarea class="form-control" id="Observation" name="Observation"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
@endsection
