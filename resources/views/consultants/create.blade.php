@extends('layouts.app')

@section('title', 'Ajouter un Consultant')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h1 class="mt-4">Ajouter un Consultant</h1>
        <a href="{{ route('consultants.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Retour à la liste
        </a>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">
                <i class="fas fa-user-tie me-1"></i> Informations du consultant
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

            <form action="{{ route('consultants.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Informations personnelles</h5>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nom" class="form-label fw-bold">Nom <span class="text-danger">*</span></label>
                                <input type="text" name="nom" id="nom" class="form-control" required value="{{ old('nom') }}">
                                <div class="invalid-feedback">Veuillez saisir le nom.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="prenom" class="form-label fw-bold">Prénom <span class="text-danger">*</span></label>
                                <input type="text" name="prenom" id="prenom" class="form-control" required value="{{ old('prenom') }}">
                                <div class="invalid-feedback">Veuillez saisir le prénom.</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="datenaissance" class="form-label fw-bold">Date de Naissance <span class="text-danger">*</span></label>
                                <input type="date" name="datenaissance" id="datenaissance" class="form-control" required value="{{ old('datenaissance') }}">
                                <div class="invalid-feedback">Veuillez sélectionner une date de naissance.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="nationalité" class="form-label fw-bold">Nationalité <span class="text-danger">*</span></label>
                                <input type="text" name="nationalité" id="nationalité" class="form-control" required value="{{ old('nationalité') }}">
                                <div class="invalid-feedback">Veuillez saisir la nationalité.</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="profil" class="form-label fw-bold">Profil <span class="text-danger">*</span></label>
                            <input type="text" name="profil" id="profil" class="form-control" required value="{{ old('profil') }}">
                            <div class="invalid-feedback">Veuillez saisir le profil.</div>
                        </div>

                        <div class="mb-3">
                            <label for="expérience" class="form-label fw-bold">Expérience (années) <span class="text-danger">*</span></label>
                            <input type="number" name="expérience" id="expérience" class="form-control" required value="{{ old('expérience') }}">
                            <div class="invalid-feedback">Veuillez saisir le nombre d'années d'expérience.</div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Coordonnées</h5>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ville" class="form-label fw-bold">Ville <span class="text-danger">*</span></label>
                                <input type="text" name="ville" id="ville" class="form-control" required value="{{ old('ville') }}">
                                <div class="invalid-feedback">Veuillez saisir la ville.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="pays" class="form-label fw-bold">Pays <span class="text-danger">*</span></label>
                                <input type="text" name="pays" id="pays" class="form-control" required value="{{ old('pays') }}">
                                <div class="invalid-feedback">Veuillez saisir le pays.</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="téléphone" class="form-label fw-bold">Téléphone <span class="text-danger">*</span></label>
                                <input type="text" name="téléphone" id="téléphone" class="form-control" required value="{{ old('téléphone') }}">
                                <div class="invalid-feedback">Veuillez saisir le numéro de téléphone.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                                <div class="invalid-feedback">Veuillez saisir une adresse email valide.</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="dateenregistrement" class="form-label fw-bold">Date d'Enregistrement <span class="text-danger">*</span></label>
                            <input type="date" name="dateenregistrement" id="dateenregistrement" class="form-control" required value="{{ old('dateenregistrement') }}">
                            <div class="invalid-feedback">Veuillez sélectionner une date d'enregistrement.</div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Documents</h5>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="CV" class="form-label fw-bold">CV</label>
                        <input type="file" name="CV" id="CV" class="form-control" accept=".pdf,.doc,.docx">
                        <div class="form-text">Formats acceptés: PDF, DOC, DOCX</div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="RéférenceContrat" class="form-label fw-bold">Référence Contrat</label>
                        <input type="file" name="RéférenceContrat" id="RéférenceContrat" class="form-control" accept=".pdf,.doc,.docx">
                        <div class="form-text">Formats acceptés: PDF, DOC, DOCX</div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="ManifestationInt" class="form-label fw-bold">Manifestation d'Intérêt</label>
                        <input type="file" name="ManifestationInt" id="ManifestationInt" class="form-control" accept=".pdf,.doc,.docx">
                        <div class="form-text">Formats acceptés: PDF, DOC, DOCX</div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4 gap-2">
                    <a href="{{ route('consultants.index') }}" class="btn btn-secondary">
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