@extends('layouts.app')

@section('title', 'Page Personnels')

@section('content')

<h1>Modifier un type de mission</h1>

<!-- Affichage des erreurs -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('type_de_missions.update', $type_de_mission->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="type" class="form-label">Type de mission</label>
        <input type="text" name="type" id="type" class="form-control" value="{{ old('type', $type_de_mission->type) }}" placeholder="Exemple : Externe ou Interne" required>
    </div>

    <button type="submit" class="btn btn-success">Mettre à jour</button>
    <a href="{{ route('type_de_missions.index') }}" class="btn btn-secondary">Annuler</a>
</form>

@endsection
