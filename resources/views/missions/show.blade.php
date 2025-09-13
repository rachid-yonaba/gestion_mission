@extends('layouts.app')

@section('title', 'Détails de la Mission')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0">
                        <i class="fas fa-tasks me-2"></i>Détails de la mission
                    </h2>
                    <a href="{{ route('missions.index') }}" class="btn btn-sm btn-light">
                        <i class="fas fa-arrow-left me-1"></i> Retour
                    </a>
                </div>

                <div class="card-body">
                    <!-- Informations principales -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h4 class="border-bottom pb-2 mb-3 text-primary">
                                <i class="fas fa-info-circle me-2"></i>Informations principales
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-align-left me-1"></i> Description :</strong>
                                <p class="mt-1">{{ $mission->Description }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-tag me-1"></i> Type de mission :</strong>
                                <p class="mt-1">{{ $mission->type }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-user-tie me-1"></i> Chef de mission :</strong>
                                <p class="mt-1">{{ $mission->chef_name ?? 'Non spécifié' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-user-graduate me-1"></i> Consultant :</strong>
                                <p class="mt-1">{{ $mission->NomConsultant }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-building me-1"></i> Client :</strong>
                                <p class="mt-1">{{ $mission->NomClient }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-money-bill-wave me-1"></i> Budget :</strong>
                                <p class="mt-1">{{ number_format($mission->budget, 0, ',', ' ') }} F CFA</p>
                            </div>
                        </div>
                    </div>

                    <!-- Dates et durée -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h4 class="border-bottom pb-2 mb-3 text-primary">
                                <i class="fas fa-calendar-alt me-2"></i>Dates et durée
                            </h4>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-play-circle me-1"></i> Date début :</strong>
                                <p class="mt-1">{{ \Carbon\Carbon::parse($mission->datedebut)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-stop-circle me-1"></i> Date fin :</strong>
                                <p class="mt-1">{{ \Carbon\Carbon::parse($mission->datefin)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-clock me-1"></i> Nombre de mois :</strong>
                                <p class="mt-1">{{ $mission->Nbremois }} mois</p>
                            </div>
                        </div>
                    </div>

                    <!-- Informations complémentaires -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h4 class="border-bottom pb-2 mb-3 text-primary">
                                <i class="fas fa-clipboard-list me-2"></i>Informations complémentaires
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-comment me-1"></i> Commentaire :</strong>
                                <p class="mt-1">{{ $mission->commentaire ?? 'Aucun commentaire' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-chart-line me-1"></i> Résultat :</strong>
                                <p class="mt-1">{{ $mission->resultat ?? 'Non spécifié' }}</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-tag me-1"></i> Libellé :</strong>
                                <p class="mt-1">{{ $mission->Libell ?? 'Non spécifié' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Informations du Cabinet -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h4 class="border-bottom pb-2 mb-3 text-primary">
                                <i class="fas fa-building me-2"></i>Informations du Cabinet
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-user me-1"></i> Nom Responsable :</strong>
                                <p class="mt-1">{{ $mission->NomResponsable }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-briefcase me-1"></i> Fonction Responsable :</strong>
                                <p class="mt-1">{{ $mission->FontionResponsable }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-users me-1"></i> Nombre d'employés :</strong>
                                <p class="mt-1">{{ $mission->Nbreemployé }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-map-marker-alt me-1"></i> Adresse :</strong>
                                <p class="mt-1">{{ $mission->Adresse }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <strong class="text-primary"><i class="fas fa-phone me-1"></i> Téléphone :</strong>
                                <p class="mt-1">{{ $mission->téléphone }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-end mt-4 gap-2">
                        <a  href="{{ route('missions.index') }}"  class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Retour à la liste
                        </a>
                        <a href="{{ route('missions.edit', $mission->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i> Modifier
                        </a>
                        <form action="{{ route('missions.destroy', $mission->id) }}" method="POST" 
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette mission ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-1"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    .card-header {
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }
    strong.text-primary {
        color: #0d6efd !important;
    }
    .border-bottom {
        border-color: #dee2e6 !important;
    }
</style>
@endsection