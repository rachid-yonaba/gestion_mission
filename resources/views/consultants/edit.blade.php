@extends('layouts.app')

@section('title', 'Modifier un Consultant')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Modifier le Consultant</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('consultants.update', $consultant->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" value="{{ $consultant->nom }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Prénom</label>
                        <input type="text" name="prenom" class="form-control" value="{{ $consultant->prenom }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Profil</label>
                        <input type="text" name="profil" class="form-control" value="{{ $consultant->profil }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date de Naissance</label>
                        <input type="date" name="datenaissance" class="form-control" value="{{ $consultant->datenaissance }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nationalité</label>
                        <input type="text" name="nationalité" class="form-control" value="{{ $consultant->nationalité }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Expérience (années)</label>
                        <input type="number" name="expérience" class="form-control" value="{{ $consultant->expérience }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Ville</label>
                        <input type="text" name="ville" class="form-control" value="{{ $consultant->ville }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Pays</label>
                        <input type="text" name="pays" class="form-control" value="{{ $consultant->pays }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Téléphone</label>
                        <input type="text" name="téléphone" class="form-control" value="{{ $consultant->téléphone }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $consultant->email }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">CV</label>
                        <input type="file" name="CV" class="form-control">
                        @if($consultant->CV)
                            <a href="{{ asset('storage/'.$consultant->CV) }}" target="_blank" class="btn btn-outline-danger btn-sm mt-1">
                                <i class="fas fa-file-pdf"></i> Voir le fichier
                            </a>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Référence Contrat</label>
                        <input type="file" name="RéférenceContrat" class="form-control">
                        @if($consultant->RéférenceContrat)
                            <a href="{{ asset('storage/'.$consultant->RéférenceContrat) }}" target="_blank" class="btn btn-outline-danger btn-sm mt-1">
                                <i class="fas fa-file-pdf"></i> Voir le fichier
                            </a>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Manifestation d’Intérêt</label>
                        <input type="file" name="ManifestationInt" class="form-control">
                        @if($consultant->ManifestationInt)
                            <a href="{{ asset('storage/'.$consultant->ManifestationInt) }}" target="_blank" class="btn btn-outline-danger btn-sm mt-1">
                                <i class="fas fa-file-pdf"></i> Voir le fichier
                            </a>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date d’Enregistrement</label>
                    <input type="date" name="dateenregistrement" class="form-control" value="{{ $consultant->dateenregistrement }}" required>
                </div>

                <div class="text-end">
                    <a href="{{ route('consultants.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left"></i> Retour</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
