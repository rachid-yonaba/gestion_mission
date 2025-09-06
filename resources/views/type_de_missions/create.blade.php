@extends('layouts.app')

@section('title', 'Page Personnels')

@section('content')
<h1>Ajouter un type de mission</h1>

<form action="{{ route('type_de_missions.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="type" class="form-label">Type de mission</label>
        <input type="text" name="type" id="type" class="form-control" placeholder="Exemple : Externe ou Interne" required>
    </div>
    <button type="submit" class="btn btn-success">Enregistrer</button>
    <a href="{{ route('type_de_missions.index') }}" class="btn btn-secondary">Annuler</a>
</form>

@endsection

