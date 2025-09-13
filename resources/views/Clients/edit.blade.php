@extends('layouts.app')

@section('title', 'Modifier un Client')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h1 class="mt-4">Modifier un Client</h1>
        <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Retour à la liste
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">
                <i class="fas fa-building me-1"></i> Modification du client : {{ $client->Structure }}
            </h5>
        </div>
        
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h6 class="alert-heading">Veuillez corriger les erreurs suivantes :</h6>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Informations générales</h5>
                        
                        <div class="mb-3">
                            <label for="NomResponsable" class="form-label fw-bold">Nom Responsable <span class="text-danger">*</span></label>
                            <input type="text" name="NomResponsable" class="form-control" id="NomResponsable" 
                                   value="{{ old('NomResponsable', $client->NomResponsable) }}" required>
                            <div class="invalid-feedback">Veuillez saisir le nom du responsable.</div>
                        </div>

                        <div class="mb-3">
                            <label for="FonctionResponsable" class="form-label fw-bold">Fonction Responsable <span class="text-danger">*</span></label>
                            <input type="text" name="FonctionResponsable" class="form-control" id="FonctionResponsable" 
                                   value="{{ old('FonctionResponsable', $client->FonctionResponsable) }}" required>
                            <div class="invalid-feedback">Veuillez saisir la fonction du responsable.</div>
                        </div>

                        <div class="mb-3">
                            <label for="Structure" class="form-label fw-bold">Structure <span class="text-danger">*</span></label>
                            <input type="text" name="Structure" class="form-control" id="Structure" 
                                   value="{{ old('Structure', $client->Structure) }}" required>
                            <div class="invalid-feedback">Veuillez saisir la structure.</div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Dates du contrat</h5>
                        
                        <div class="mb-3">
                            <label for="datedebut" class="form-label fw-bold">Date Début <span class="text-danger">*</span></label>
                            <input type="date" name="datedebut" class="form-control" id="datedebut" 
                                   value="{{ old('datedebut', $client->datedebut) }}" required>
                            <div class="invalid-feedback">Veuillez sélectionner une date de début.</div>
                        </div>

                        <div class="mb-3">
                            <label for="datefin" class="form-label fw-bold">Date Fin <span class="text-danger">*</span></label>
                            <input type="date" name="datefin" class="form-control" id="datefin" 
                                   value="{{ old('datefin', $client->datefin) }}" required>
                            <div class="invalid-feedback">Veuillez sélectionner une date de fin.</div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Documents</h5>
                        <p class="text-muted">Les fichiers existants resteront inchangés si aucun nouveau fichier n'est sélectionné.</p>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="InfoFinancière" class="form-label fw-bold">Info Financière</label>
                        @if($client->InfoFinancière)
                            <div class="mb-2">
                                <a href="{{ asset('storage/'.$client->InfoFinancière) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-file-pdf me-1"></i> Voir le fichier actuel
                                </a>
                            </div>
                        @endif
                        <input type="file" name="InfoFinancière" class="form-control" id="InfoFinancière">
                        <div class="form-text">Formats acceptés: PDF, Word, Excel</div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="RéférenceContrat" class="form-label fw-bold">Référence Contrat</label>
                        @if($client->RéférenceContrat)
                            <div class="mb-2">
                                <a href="{{ asset('storage/'.$client->RéférenceContrat) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-file-pdf me-1"></i> Voir le fichier actuel
                                </a>
                            </div>
                        @endif
                        <input type="file" name="RéférenceContrat" class="form-control" id="RéférenceContrat">
                        <div class="form-text">Formats acceptés: PDF, Word, Excel</div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="ManifestationIntéret" class="form-label fw-bold">Manifestation Intérêt</label>
                        @if($client->ManifestationIntéret)
                            <div class="mb-2">
                                <a href="{{ asset('storage/'.$client->ManifestationIntéret) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-file-pdf me-1"></i> Voir le fichier actuel
                                </a>
                            </div>
                        @endif
                        <input type="file" name="ManifestationIntéret" class="form-control" id="ManifestationIntéret">
                        <div class="form-text">Formats acceptés: PDF, Word, Excel</div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4 gap-2">
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-1"></i> Annuler
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-sync-alt me-1"></i> Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script pour la validation Bootstrap -->
<script>
// Validation Bootstrap
(function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
})()
</script>
@endsection