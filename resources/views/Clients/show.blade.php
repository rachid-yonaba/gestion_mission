@extends('layouts.app')

@section('title', 'Détails du Client')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4">Détails du Client</h1>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Informations du Client</h5>
            <div>
                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm me-2">
                    <i class="fas fa-edit"></i> Modifier
                </a>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce client ?')">
                        <i class="fas fa-trash-alt"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Nom Responsable :</strong> {{ $client->NomResponsable }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Fonction Responsable :</strong> {{ $client->FonctionResponsable }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Structure :</strong> {{ $client->Structure }}</p>
                </div>
                <div class="col-md-3">
                    <p><strong>Date Début :</strong> {{ $client->datedebut }}</p>
                </div>
                <div class="col-md-3">
                    <p><strong>Date Fin :</strong> {{ $client->datefin }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <p><strong>Info Financière :</strong><br>
                        @if($client->InfoFinancière)
                            <a href="{{ asset('storage/'.$client->InfoFinancière) }}" target="_blank" class="btn btn-outline-danger btn-sm mt-1">
                                <i class="fas fa-file-pdf"></i> Voir
                            </a>
                        @else
                            Aucun fichier
                        @endif
                    </p>
                </div>
                <div class="col-md-4">
                    <p><strong>Référence Contrat :</strong><br>
                        @if($client->RéférenceContrat)
                            <a href="{{ asset('storage/'.$client->RéférenceContrat) }}" target="_blank" class="btn btn-outline-danger btn-sm mt-1">
                                <i class="fas fa-file-pdf"></i> Voir
                            </a>
                        @else
                            Aucun fichier
                        @endif
                    </p>
                </div>
                <div class="col-md-4">
                    <p><strong>Manifestation Intérêt :</strong><br>
                        @if($client->ManifestationIntéret)
                            <a href="{{ asset('storage/'.$client->ManifestationIntéret) }}" target="_blank" class="btn btn-outline-danger btn-sm mt-1">
                                <i class="fas fa-file-pdf"></i> Voir
                            </a>
                        @else
                            Aucun fichier
                        @endif
                    </p>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
