@extends('layouts.app')

@section('title', 'Détails du Client')

@section('content')

<h1>Liste des missions</h1>

<!-- Message de succès -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('missions.create') }}" class="btn btn-primary mb-3">Ajouter une mission</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Chef de mission</th>
            <th>Nom Client</th>
            <th>Nom Consultant</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($missions as $mission)
            <tr>
                <td>{{ $mission->id }}</td>
                <td>{{ $mission->type }}</td>
                <td>{{ $mission->chef }}</td>
                <td>{{ $mission->NomClient }}</td>
                <td>{{ $mission->NomConsultant }}</td>
                <td>{{ $mission->datedebut }}</td>
                <td>{{ $mission->datefin }}</td>
                <td>
                 <a href="{{ route('missions.show', $mission->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center">Aucune mission trouvée</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection

