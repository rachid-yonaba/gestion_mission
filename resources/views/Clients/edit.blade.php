@extends('layouts.app')

@section('title', 'Modifier un Client')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Modifier un Client</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nom Responsable</label>
                    <input type="text" name="NomResponsable" value="{{ old('NomResponsable', $client->NomResponsable) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Fonction Responsable</label>
                    <input type="text" name="FonctionResponsable" value="{{ old('FonctionResponsable', $client->FonctionResponsable) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Structure</label>
                    <input type="text" name="Structure" value="{{ old('Structure', $client->Structure) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Date Début</label>
                    <input type="date" name="datedebut" value="{{ old('datedebut', $client->datedebut) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Date Fin</label>
                    <input type="date" name="datefin" value="{{ old('datefin', $client->datefin) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Info Financière</label>
                    @if($client->InfoFinancière)
                        <div class="mb-1">
                            <a href="{{ asset('storage/'.$client->InfoFinancière) }}" target="_blank">
                                <i class="fas fa-file-pdf"></i> Fichier actuel
                            </a>
                        </div>
                    @endif
                    <input type="file" name="InfoFinancière" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Référence Contrat</label>
                    @if($client->RéférenceContrat)
                        <div class="mb-1">
                            <a href="{{ asset('storage/'.$client->RéférenceContrat) }}" target="_blank">
                                <i class="fas fa-file-pdf"></i> Fichier actuel
                            </a>
                        </div>
                    @endif
                    <input type="file" name="RéférenceContrat" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Manifestation Intérêt</label>
                    @if($client->ManifestationIntéret)
                        <div class="mb-1">
                            <a href="{{ asset('storage/'.$client->ManifestationIntéret) }}" target="_blank">
                                <i class="fas fa-file-pdf"></i> Fichier actuel
                            </a>
                        </div>
                    @endif
                    <input type="file" name="ManifestationIntéret" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Mettre à jour
                </button>
                <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Annuler
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
