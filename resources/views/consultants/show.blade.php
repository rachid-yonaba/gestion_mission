@extends('layouts.app')

@section('title', 'Détails du Consultant')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4">Détails du Consultant</h1>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Informations du Consultant</h5>
            <div>
                <a href="{{ route('consultants.edit', $consultant->id) }}" class="btn btn-warning btn-sm me-2">
                    <i class="fas fa-edit"></i> Modifier
                </a>
                <form action="{{ route('consultants.destroy', $consultant->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce consultant ?')">
                        <i class="fas fa-trash-alt"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-6"><p><strong>Nom :</strong> {{ $consultant->nom }}</p></div>
                <div class="col-md-6"><p><strong>Prénom :</strong> {{ $consultant->prenom }}</p></div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4"><p><strong>Profil :</strong> {{ $consultant->profil }}</p></div>
                <div class="col-md-4"><p><strong>Date de Naissance :</strong> {{ $consultant->datenaissance }}</p></div>
                <div class="col-md-4"><p><strong>Nationalité :</strong> {{ $consultant->nationalité }}</p></div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4"><p><strong>Expérience :</strong> {{ $consultant->expérience }} ans</p></div>
                <div class="col-md-4"><p><strong>Ville :</strong> {{ $consultant->ville }}</p></div>
                <div class="col-md-4"><p><strong>Pays :</strong> {{ $consultant->pays }}</p></div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6"><p><strong>Téléphone :</strong> {{ $consultant->téléphone }}</p></div>
                <div class="col-md-6"><p><strong>Email :</strong> {{ $consultant->email }}</p></div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <p><strong>CV :</strong><br>
                        @if($consultant->CV)
                            <a href="{{ asset('storage/'.$consultant->CV) }}" target="_blank" class="btn btn-outline-danger btn-sm mt-1">
                                <i class="fas fa-file-pdf"></i> Voir
                            </a>
                        @else Aucun fichier @endif
                    </p>
                </div>
                <div class="col-md-4">
                    <p><strong>Référence Contrat :</strong><br>
                        @if($consultant->RéférenceContrat)
                            <a href="{{ asset('storage/'.$consultant->RéférenceContrat) }}" target="_blank" class="btn btn-outline-danger btn-sm mt-1">
                                <i class="fas fa-file-pdf"></i> Voir
                            </a>
                        @else Aucun fichier @endif
                    </p>
                </div>
                <div class="col-md-4">
                    <p><strong>Manifestation Intérêt :</strong><br>
                        @if($consultant->ManifestationInt)
                            <a href="{{ asset('storage/'.$consultant->ManifestationInt) }}" target="_blank" class="btn btn-outline-danger btn-sm mt-1">
                                <i class="fas fa-file-pdf"></i> Voir
                            </a>
                        @else Aucun fichier @endif
                    </p>
                </div>
            </div>

            <div class="text-end">
                <p><strong>Date d’Enregistrement :</strong> {{ $consultant->dateenregistrement }}</p>
                <a href="{{ route('consultants.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Retour à la liste</a>
            </div>

        </div>
    </div>
</div>
@endsection
