@extends('layouts.app')

@section('title', 'Modifier une Mission')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0">Modifier la mission</h2>
                    <a href="{{ route('missions.index') }}" class="btn btn-sm btn-light">
                        <i class="fas fa-arrow-left me-1"></i> Retour
                    </a>
                </div>
                
                <div class="card-body">
                    <!-- Affichage des erreurs -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h5 class="alert-heading">Veuillez corriger les erreurs suivantes :</h5>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('missions.update', $mission->id) }}" method="POST" id="missionForm">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Informations principales -->
                            <div class="col-md-6">
                                <h4 class="border-bottom pb-2 mb-3 text-primary">Informations principales</h4>
                                
                                <div class="mb-3">
                                    <label for="Description" class="form-label fw-bold">Description <span class="text-danger">*</span></label>
                                    <textarea name="Description" class="form-control" id="Description" rows="4" required>{{ old('Description', $mission->Description) }}</textarea>
                                    <div class="invalid-feedback">Veuillez saisir une description.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label fw-bold">Type de mission <span class="text-danger">*</span></label>
                                    <select name="type" class="form-select" id="type" required>
                                        <option value="">-- Choisir --</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->type }}" {{ (old('type', $mission->type) == $type->type) ? 'selected' : '' }}>
                                                {{ $type->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Veuillez sélectionner un type.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="chef" class="form-label fw-bold">Chef de mission <span class="text-danger">*</span></label>
                                    <select name="chef" class="form-select" id="chef" required>
                                        <option value="">-- Choisir --</option>
                                        @foreach($chefs as $chef)
                                            <option value="{{ $chef->nom }}" {{ (old('chef', $mission->chef) == $chef->nom) ? 'selected' : '' }}>
                                                {{ $chef->nom }} {{ $chef->prenom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Veuillez sélectionner un chef de mission</div>
                                </div>

                                <div class="mb-3">
                                    <label for="NomConsultant" class="form-label fw-bold">Nom Consultant <span class="text-danger">*</span></label>
                                    <select name="NomConsultant" class="form-select" id="NomConsultant" required>
                                        <option value="">-- Choisir --</option>
                                        @foreach($consultants as $consultant)
                                            <option value="{{ $consultant->nom }}" {{ (old('NomConsultant', $mission->NomConsultant) == $consultant->nom) ? 'selected' : '' }}>
                                                {{ $consultant->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Veuillez sélectionner un consultant.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="NomClient" class="form-label fw-bold">Nom du Client<span class="text-danger">*</span></label>
                                    <select name="NomClient" class="form-select" id="NomClient" required>
                                        <option value="">-- Choisir --</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->NomResponsable }}" {{ (old('NomClient', $mission->NomClient) == $client->NomResponsable) ? 'selected' : '' }}>
                                                {{ $client->Structure }} ({{ $client->NomResponsable }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Veuillez sélectionner un client.</div>
                                </div>
                            </div>

                            <!-- Informations complémentaires -->
                            <div class="col-md-6">
                                <h4 class="border-bottom pb-2 mb-3 text-primary">Informations complémentaires</h4>
                                
                                <div class="mb-3">
                                    <label for="budget" class="form-label fw-bold">Budget</label>
                                    <div class="input-group">
                                        <span class="input-group-text">F CFA</span>
                                        <input type="number" step="0.01" name="budget" class="form-control" id="budget" value="{{ old('budget', $mission->budget) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="datedebut" class="form-label fw-bold">Date début</label>
                                        <input type="date" name="datedebut" class="form-control" id="datedebut" value="{{ old('datedebut', $mission->datedebut) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="datefin" class="form-label fw-bold">Date fin</label>
                                        <input type="date" name="datefin" class="form-control" id="datefin" value="{{ old('datefin', $mission->datefin) }}">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="commentaire" class="form-label fw-bold">Commentaire</label>
                                    <textarea name="commentaire" class="form-control" id="commentaire" rows="3">{{ old('commentaire', $mission->commentaire) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="resultat" class="form-label fw-bold">Résultat</label>
                                    <textarea name="resultat" class="form-control" id="resultat" rows="3">{{ old('resultat', $mission->resultat) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="Nbremois" class="form-label fw-bold">Nombre de mois</label>
                                    <input type="number" name="Nbremois" class="form-control" id="Nbremois" value="{{ old('Nbremois', $mission->Nbremois) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="Libell" class="form-label fw-bold">Libellé</label>
                                    <input type="text" name="Libell" class="form-control" id="Libell" value="{{ old('Libell', $mission->Libell) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Informations du client -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h4 class="border-bottom pb-2 mb-3 text-primary">Informations du Cabinet</h4>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="NomResponsable" class="form-label fw-bold">Nom Responsable</label>
                                <input type="text" name="NomResponsable" class="form-control" id="NomResponsable" value="{{ old('NomResponsable', $mission->NomResponsable) }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="FontionResponsable" class="form-label fw-bold">Fonction Responsable</label>
                                <input type="text" name="FontionResponsable" class="form-control" id="FontionResponsable" value="{{ old('FontionResponsable', $mission->FontionResponsable) }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="Nbreemployé" class="form-label fw-bold">Nombre d'employés</label>
                                <input type="number" name="Nbreemployé" class="form-control" id="Nbreemployé" value="{{ old('Nbreemployé', $mission->Nbreemployé) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Adresse" class="form-label fw-bold">Adresse</label>
                                <input type="text" name="Adresse" class="form-control" id="Adresse" value="{{ old('Adresse', $mission->Adresse) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="téléphone" class="form-label fw-bold">Téléphone</label>
                                <input type="text" name="téléphone" class="form-control" id="téléphone" value="{{ old('téléphone', $mission->téléphone) }}">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4 gap-2">
                            <a href="{{ route('missions.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Annuler
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-1"></i> Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script pour gérer la validation -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('missionForm');
    
    // Désactiver la validation HTML5 native
    form.noValidate = true;
    
    // Valider manuellement avant la soumission
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            
            // Afficher les messages d'erreur seulement après tentative de soumission
            const requiredSelects = form.querySelectorAll('select[required]');
            requiredSelects.forEach(select => {
                if (!select.value) {
                    select.classList.add('is-invalid');
                } else {
                    select.classList.remove('is-invalid');
                    select.classList.add('is-valid');
                }
            });
            
            const requiredInputs = form.querySelectorAll('input[required], textarea[required]');
            requiredInputs.forEach(input => {
                if (!input.value) {
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                }
            });
        }
        
        form.classList.add('was-validated');
    });
    
    // Enlever les messages d'erreur quand une valeur est sélectionnée
    const selects = form.querySelectorAll('select');
    selects.forEach(select => {
        select.addEventListener('change', function() {
            if (this.value) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
            }
        });
    });
    
    // Initialiser les sélecteurs avec la classe is-valid si une valeur est déjà sélectionnée
    const initializedSelects = form.querySelectorAll('select');
    initializedSelects.forEach(select => {
        if (select.value) {
            select.classList.add('is-valid');
        }
    });
});
</script>
@endsection