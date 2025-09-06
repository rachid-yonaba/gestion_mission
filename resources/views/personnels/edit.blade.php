@extends('layouts.app')

@section('title', 'Modifier un personnel')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Modifier un personnel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('personnels') }}">Gestion du personnel</a></li>
            <li class="breadcrumb-item active">Modifier</li>
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

                <form action="{{ route('personnels.update', $personnel->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $personnel->nom) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $personnel->prenom) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="service" class="form-label">Service</label>
                        <input type="text" class="form-control" id="service" name="service" value="{{ old('service', $personnel->service) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fonction" class="form-label">Fonction</label>
                        <input type="text" class="form-control" id="fonction" name="fonction" value="{{ old('fonction', $personnel->fonction) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone', $personnel->telephone) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $personnel->email) }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                    <a href="{{ route('personnels') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
