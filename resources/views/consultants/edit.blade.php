@extends('layouts.app')

@section('title', 'Modifier un Consultant')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h1 class="mt-4">Modifier le Consultant</h1>
        <a href="{{ route('consultants.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Retour à la liste
        </a>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">
                <i class="fas fa-user-edit me-1"></i> Modification du consultant : {{ $consultant->prenom }} {{ $consultant->nom }}
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

            <form action="{{ route('consultants.update', $consultant->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Informations personnelles</h5>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nom" class="form-label fw-bold">Nom <span class="text-danger">*</span></label>
                                <input type="text" name="nom" class="form-control" id="nom" 
                                       value="{{ old('nom', $consultant->nom) }}" required>
                                <div class="invalid-feedback">Veuillez saisir le nom.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="prenom" class="form-label fw-bold">Prénom <span class="text-danger">*</span></label>
                                <input type="text" name="prenom" class="form-control" id="prenom" 
                                       value="{{ old('prenom', $consultant->prenom) }}" required>
                                <div class="invalid-feedback">Veuillez saisir le prénom.</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="datenaissance" class="form-label fw-bold">Date de Naissance <span class="text-danger">*</span></label>
                                <input type="date" name="datenaissance" class="form-control" id="datenaissance" 
                                       value="{{ old('datenaissance', $consultant->datenaissance) }}" required>
                                <div class="invalid-feedback">Veuillez sélectionner une date de naissance.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="nationalité" class="form-label fw-bold">Nationalité <span class="text-danger">*</span></label>
                                <input type="text" name="nationalité" class="form-control" id="nationalité" 
                                       value="{{ old('nationalité', $consultant->nationalité) }}" required>
                                <div class="invalid-feedback">Veuillez saisir la nationalité.</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="profil" class="form-label fw-bold">Profil <span class="text-danger">*</span></label>
                            <input type="text" name="profil" class="form-control" id="profil" 
                                   value="{{ old('profil', $consultant->profil) }}" required>
                            <div class="invalid-feedback">Veuillez saisir le profil.</div>
                        </div>

                        <div class="mb-3">
                            <label for="expérience" class="form-label fw-bold">Expérience (années) <span class="text-danger">*</span></label>
                            <input type="number" name="expérience" class="form-control" id="expérience" 
                                   value="{{ old('expérience', $consultant->expérience) }}" required>
                            <div class="invalid-feedback">Veuillez saisir le nombre d'années d'expérience.</div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Coordonnées</h5>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ville" class="form-label fw-bold">Ville <span class="text-danger">*</span></label>
                                <input type="text" name="ville" class="form-control" id="ville" 
                                       value="{{ old('ville', $consultant->ville) }}" required>
                                <div class="invalid-feedback">Veuillez saisir la ville.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="pays" class="form-label fw-bold">Pays <span class="text-danger">*</span></label>
                                <input type="text" name="pays" class="form-control" id="pays" 
                                       value="{{ old('pays', $consultant->pays) }}" required>
                                <div class="invalid-feedback">Veuillez saisir le pays.</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="téléphone" class="form-label fw-bold">Téléphone <span class="text-danger">*</span></label>
                                <input type="text" name="téléphone" class="form-control" id="téléphone" 
                                       value="{{ old('téléphone', $consultant->téléphone) }}" required>
                                <div class="invalid-feedback">Veuillez saisir le numéro de téléphone.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" id="email" 
                                       value="{{ old('email', $consultant->email) }}" required>
                                <div class="invalid-feedback">Veuillez saisir une adresse email valide.</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="dateenregistrement" class="form-label fw-bold">Date d'Enregistrement <span class="text-danger">*</span></label>
                            <input type="date" name="dateenregistrement" class="form-control" id="dateenregistrement" 
                                   value="{{ old('dateenregistrement', $consultant->dateenregistrement) }}" required>
                            <div class="invalid-feedback">Veuillez sélectionner une date d'enregistrement.</div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Documents</h5>
                        <p class="text-muted">Les fichiers existants resteront inchangés si aucun nouveau fichier n'est sélectionné.</p>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="CV" class="form-label fw-bold">CV</label>
                        @if($consultant->CV)
                            <div class="mb-2">
                                <a href="{{ asset('storage/'.$consultant->CV) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-file-pdf me-1"></i> Voir le fichier actuel
                                </a>
                            </div>
                        @endif
                        <input type="file" name="CV" class="form-control" id="CV" accept=".pdf,.doc,.docx">
                        <div class="form-text">Formats acceptés: PDF, DOC, DOCX</div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="RéférenceContrat" class="form-label fw-bold">Référence Contrat</label>
                        @if($consultant->RéférenceContrat)
                            <div class="mb-2">
                                <a href="{{ asset('storage/'.$consultant->RéférenceContrat) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-file-pdf me-1"></i> Voir le fichier actuel
                                </a>
                            </div>
                        @endif
                        <input type="file" name="RéférenceContrat" class="form-control" id="RéférenceContrat" accept=".pdf,.doc,.docx">
                        <div class="form-text">Formats acceptés: PDF, DOC, DOCX</div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="ManifestationInt" class="form-label fw-bold">Manifestation d'Intérêt</label>
                        @if($consultant->ManifestationInt)
                            <div class="mb-2">
                                <a href="{{ asset('storage/'.$consultant->ManifestationInt) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-file-pdf me-1"></i> Voir le fichier actuel
                                </a>
                            </div>
                        @endif
                        <input type="file" name="ManifestationInt" class="form-control" id="ManifestationInt" accept=".pdf,.doc,.docx">
                        <div class="form-text">Formats acceptés: PDF, DOC, DOCX</div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4 gap-2">
                    <a href="{{ route('consultants.index') }}" class="btn btn-secondary">
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