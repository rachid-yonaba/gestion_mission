@extends('layouts.app')

@section('title', 'Ajouter un Consultant')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Ajouter un Consultant</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('consultants.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="profil" class="form-label">Profil</label>
                        <input type="text" name="profil" id="profil" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="datenaissance" class="form-label">Date de Naissance</label>
                        <input type="date" name="datenaissance" id="datenaissance" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nationalité" class="form-label">Nationalité</label>
                        <input type="text" name="nationalité" id="nationalité" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="expérience" class="form-label">Expérience (années)</label>
                        <input type="number" name="expérience" id="expérience" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" name="ville" id="ville" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="pays" class="form-label">Pays</label>
                        <input type="text" name="pays" id="pays" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="téléphone" class="form-label">Téléphone</label>
                        <input type="text" name="téléphone" id="téléphone" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="CV" class="form-label">CV</label>
                        <input type="file" name="CV" id="CV" class="form-control" accept=".pdf,.doc,.docx">
                    </div>
                    <div class="col-md-4">
                        <label for="RéférenceContrat" class="form-label">Référence Contrat</label>
                        <input type="file" name="RéférenceContrat" id="RéférenceContrat" class="form-control" accept=".pdf,.doc,.docx">
                    </div>
                    <div class="col-md-4">
                        <label for="ManifestationInt" class="form-label">Manifestation d’Intérêt</label>
                        <input type="file" name="ManifestationInt" id="ManifestationInt" class="form-control" accept=".pdf,.doc,.docx">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="dateenregistrement" class="form-label">Date d’Enregistrement</label>
                    <input type="date" name="dateenregistrement" id="dateenregistrement" class="form-control" required>
                </div>

                <div class="text-end">
                    <a href="{{ route('consultants.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left"></i> Retour</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
