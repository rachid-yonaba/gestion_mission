@extends('layouts.app')

@section('title', 'Ajouter un personnel')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ajouter un personnel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item btn btn-info"><a href="{{ route('personnels') }}">Gestion du personnel</a></li>
            <li class="breadcrumb-item active">Ajouter</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                {{-- Affichage des erreurs --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('personnels.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="service" class="form-label">Service</label>
                        <input type="text" class="form-control" id="service" name="service" value="{{ old('service') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fonction" class="form-label">Fonction</label>
                        <input type="text" class="form-control" id="fonction" name="fonction" value="{{ old('fonction') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('personnels') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
