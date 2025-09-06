@extends('layouts.app')

@section('title', 'Liste des Clients')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Gestion des Clients</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i> Clients</div>
            <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Ajouter</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom Responsable</th>
                        <th>Fonction</th>
                        <th>Structure</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                       <td>{{ $client->id }}</td>
                        <td>{{ $client->NomResponsable }}</td>
                        <td>{{ $client->FonctionResponsable }}</td>
                        <td>{{ $client->Structure }}</td>
                        <td class="text-center">
                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
