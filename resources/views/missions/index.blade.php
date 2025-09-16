@extends('layouts.app')

@section('content')
<h2 class="mb-3">Liste des Missions</h2>
<a href="{{ route('missions.create') }}" class="btn btn-success mb-3">Créer une Mission</a>

<table class="table table-bordered table-striped">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Libellé</th>
            <th>Type</th>
            <th>Chef de Mission</th>
            <th>Consultant</th>
            <th>Client</th>
            <th>Détail</th>
        </tr>
    </thead>
    <tbody>
        @foreach($missions as $mission)
        <tr>
            <td>{{ $mission->id }}</td>
            <td>{{ $mission->code }}</td>
            <td>{{ $mission->libelle }}</td>
            <td>{{ $mission->typedemission->type ?? '-' }}</td>
            <td>{{ $mission->chef_mission }}</td>
            <td>{{ $mission->consultant->nom ?? '-' }}</td>
            <td>{{ $mission->client->Structure ?? '-' }}</td>
            <td><a href="{{ route('missions.show',$mission) }}" class="btn btn-info btn-sm">👁️</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
