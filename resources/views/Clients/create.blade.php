@extends('layouts.app')

@section('title', 'Ajouter un Client')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Ajouter un Client</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3"><label>Nom Responsable</label><input type="text" name="NomResponsable" class="form-control" required></div>
                <div class="mb-3"><label>Fonction Responsable</label><input type="text" name="FonctionResponsable" class="form-control" required></div>
                <div class="mb-3"><label>Structure</label><input type="text" name="Structure" class="form-control" required></div>
                <div class="mb-3"><label>Date Début</label><input type="date" name="datedebut" class="form-control" required></div>
                <div class="mb-3"><label>Date Fin</label><input type="date" name="datefin" class="form-control" required></div>
                <div class="mb-3"><label>Info Financière</label><input type="file" name="InfoFinancière" class="form-control"></div>
                <div class="mb-3"><label>Référence Contrat</label><input type="file" name="RéférenceContrat" class="form-control"></div>
                <div class="mb-3"><label>Manifestation Intérêt</label><input type="file" name="ManifestationIntéret" class="form-control"></div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Enregistrer</button>
                <a href="{{ route('clients.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection
