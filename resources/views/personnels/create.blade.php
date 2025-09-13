@extends('layouts.app')

@section('title', 'Ajouter un Personnel')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h1 class="mt-4">Ajouter un personnel</h1>
            <a href="{{ route('personnels') }}" class="btn btn-outline-info">
                <i class="fas fa-arrow-left me-1"></i> Retour à la liste
            </a>
        </div>
        
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('personnels') }}">Gestion du personnel</a></li>
            <li class="breadcrumb-item active">Ajouter</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-user-plus me-1"></i> Nouveau membre du personnel
                </h5>
            </div>
            
            <div class="card-body">
                {{-- Affichage des erreurs --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h6 class="alert-heading">Des erreurs ont été trouvées :</h6>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('personnels.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="border-bottom pb-2 mb-3 text-primary">Informations personnelles</h5>
                            
                            <div class="mb-3">
                                <label for="nom" class="form-label fw-bold">Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nom" name="nom" 
                                       value="{{ old('nom') }}" required>
                                <div class="invalid-feedback">Veuillez saisir le nom.</div>
                            </div>

                            <div class="mb-3">
                                <label for="prenom" class="form-label fw-bold">Prénom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="prenom" name="prenom" 
                                       value="{{ old('prenom') }}" required>
                                <div class="invalid-feedback">Veuillez saisir le prénom.</div>
                            </div>

                            <div class="mb-3">
                                <label for="telephone" class="form-label fw-bold">Téléphone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="telephone" name="telephone" 
                                       value="{{ old('telephone') }}" required>
                                <div class="invalid-feedback">Veuillez saisir un numéro de téléphone.</div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="{{ old('email') }}" required>
                                <div class="invalid-feedback">Veuillez saisir une adresse email valide.</div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <h5 class="border-bottom pb-2 mb-3 text-primary">Informations professionnelles</h5>
                            
                            <div class="mb-3">
                                <label for="service" class="form-label fw-bold">Service <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="service" name="service" 
                                       value="{{ old('service') }}" required>
                                <div class="invalid-feedback">Veuillez saisir le service.</div>
                            </div>

                            <div class="mb-3">
                                <label for="fonction" class="form-label fw-bold">Fonction <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fonction" name="fonction" 
                                       value="{{ old('fonction') }}" required>
                                <div class="invalid-feedback">Veuillez saisir la fonction.</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ route('personnels') }}" class="btn btn-secondary">
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
</main>

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