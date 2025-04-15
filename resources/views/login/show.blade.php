@extends('layouts.app')

@section('content')
    <h1>Détails du Login</h1>
    @foreach($login as $item)
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Log</h5>
               <p class="card-text">{{ $item->email }}</p>
                <h5 class="card-title">Id</h5>
            <p class="card-text">{{ $item->id }}</p>
            </div>
        </div>
    @endforeach
    <a href="layouts.app" class="btn btn-primary">Retour à la liste</a>
@endsection
