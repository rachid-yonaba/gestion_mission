@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        Mission : {{ $mission->libelle }} ({{ $mission->code }})
    </div>
    <div class="card-body">
        <p><strong>Description :</strong> {{ $mission->description }}</p>
        <p><strong>Chef de Mission :</strong> {{ $mission->chef_mission }}</p>
        <p><strong>Client :</strong> {{ $mission->client->Structure ?? '-' }}</p>
        <p><strong>Consultant :</strong> {{ $mission->consultant->nom ?? '-' }}</p>
        <p><strong>Type :</strong> {{ $mission->typedemission->type ?? '-' }}</p>
        <p><strong>Budget :</strong> {{ $mission->budget }}</p>
        <p><strong>Dates :</strong> {{ $mission->datedebut }} → {{ $mission->datefin }}</p>
        <p><strong>Employés :</strong> {{ $mission->nbre_employe }}</p>
        <p><strong>Résultat :</strong> {{ $mission->resultat }}</p>
        <p><strong>Durée (mois) :</strong> {{ $mission->nbre_mois }}</p>
        <p><strong>Commentaire :</strong> {{ $mission->commentaire }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('missions.edit',$mission) }}" class="btn btn-warning">Modifier</a>
        <form action="{{ route('missions.destroy',$mission) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer cette mission ?')">Supprimer</button>
        </form>
        <a href="{{ route('missions.index') }}" class="btn btn-secondary">Annuler</a>
    </div>
</div>
@endsection
