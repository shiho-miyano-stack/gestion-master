@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Relations Collaborateurs-Coopératives</h2>
    <a href="{{ route('collab_coop.create') }}" class="btn btn-primary mb-2">Ajouter une relation</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Collaborateur</th>
                <th>Coopérative</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relations as $rel)
            <tr>
                <td>{{ $rel->collaborateur->Id ?? '-' }}</td>
                <td>{{ $rel->cooperative->Id ?? '-' }}</td>
                <td> 
                    <a href="{{ route('collab_coop.edit', $rel) }}" class="btn btn-info btn-sm">voir</a>
                    <a href="{{ route('collab_coop.edit', $rel) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('collab_coop.destroy', $rel) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
