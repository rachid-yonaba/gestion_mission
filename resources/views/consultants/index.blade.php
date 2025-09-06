@extends('layouts.app')

@section('title', 'Liste des Consultants')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Gestion des Consultants</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i> Consultants</div>
            <a href="{{ route('consultants.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Ajouter</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Profil</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultants as $consultant)
                    <tr>
                        <td>{{ $consultant->nom }}</td>
                        <td>{{ $consultant->prenom }}</td>
                        <td>{{ $consultant->profil }}</td>
                        <td class="text-center">
                            <a href="{{ route('consultants.show', $consultant->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                           
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
