@extends('layouts.app')

@section('title', 'Ajouter un Type de Mission')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h1 class="mt-4">Ajouter un type de mission</h1>
        <a href="{{ route('type_de_missions.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Retour à la liste
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">
                <i class="fas fa-tasks me-1"></i> Nouveau type de mission
            </h5>
        </div>
        
        <div class="card-body">
            <form action="{{ route('type_de_missions.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="type" class="form-label fw-bold">Type de mission <span class="text-danger">*</span></label>
                            <input type="text" name="type" id="type" class="form-control" 
                                   placeholder="Exemple : Externe ou Interne" required value="{{ old('type') }}">
                            <div class="invalid-feedback">Veuillez saisir un type de mission.</div>
                            <div class="form-text">Saisissez le type de mission (ex: Externe, Interne, Audit, Conseil...)</div>
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('type_de_missions.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Annuler
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-1"></i> Enregistrer
                            </button>
                        </div>
                    </div>
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