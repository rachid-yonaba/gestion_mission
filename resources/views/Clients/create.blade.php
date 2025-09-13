@extends('layouts.app')

@section('title', 'Ajouter un Client')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h1 class="mt-4">Ajouter un Client</h1>
        <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Retour à la liste
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">
                <i class="fas fa-building me-1"></i> Informations du client
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

            <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Informations générales</h5>
                        
                        <div class="mb-3">
                            <label for="NomResponsable" class="form-label fw-bold">Nom Responsable <span class="text-danger">*</span></label>
                            <input type="text" name="NomResponsable" class="form-control" id="NomResponsable" required value="{{ old('NomResponsable') }}">
                            <div class="invalid-feedback">Veuillez saisir le nom du responsable.</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="FonctionResponsable" class="form-label fw-bold">Fonction Responsable <span class="text-danger">*</span></label>
                            <input type="text" name="FonctionResponsable" class="form-control" id="FonctionResponsable" required value="{{ old('FonctionResponsable') }}">
                            <div class="invalid-feedback">Veuillez saisir la fonction du responsable.</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="Structure" class="form-label fw-bold">Structure <span class="text-danger">*</span></label>
                            <input type="text" name="Structure" class="form-control" id="Structure" required value="{{ old('Structure') }}">
                            <div class="invalid-feedback">Veuillez saisir la structure.</div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Dates du contrat</h5>
                        
                        <div class="mb-3">
                            <label for="datedebut" class="form-label fw-bold">Date Début <span class="text-danger">*</span></label>
                            <input type="date" name="datedebut" class="form-control" id="datedebut" required value="{{ old('datedebut') }}">
                            <div class="invalid-feedback">Veuillez sélectionner une date de début.</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="datefin" class="form-label fw-bold">Date Fin <span class="text-danger">*</span></label>
                            <input type="date" name="datefin" class="form-control" id="datefin" required value="{{ old('datefin') }}">
                            <div class="invalid-feedback">Veuillez sélectionner une date de fin.</div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Documents</h5>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="InfoFinancière" class="form-label fw-bold">Info Financière</label>
                        <input type="file" name="InfoFinancière" class="form-control" id="InfoFinancière">
                        <div class="form-text">Format accepté: PDF, Word, Excel</div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="RéférenceContrat" class="form-label fw-bold">Référence Contrat</label>
                        <input type="file" name="RéférenceContrat" class="form-control" id="RéférenceContrat">
                        <div class="form-text">Format accepté: PDF, Word, Excel</div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="ManifestationIntéret" class="form-label fw-bold">Manifestation Intérêt</label>
                        <input type="file" name="ManifestationIntéret" class="form-control" id="ManifestationIntéret">
                        <div class="form-text">Format accepté: PDF, Word, Excel</div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4 gap-2">
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-1"></i> Annuler
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Enregistrer
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