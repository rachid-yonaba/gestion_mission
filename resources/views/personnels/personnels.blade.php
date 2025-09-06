@extends('layouts.app')

@section('title', 'Page Personnels')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Yon Associates</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Gestion du personnel</li>
        </ol>

        {{-- Message de succès --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Liste des Personnels
                </div>
                <a href="{{ route('personnels.create') }}" class="btn btn-primary btn-sm">Ajouter un personnel</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                           <th>Id</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Service</th>
                            <th>Fonction</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personnels as $personnel)
                        <tr> 
                            <td>{{ $personnel->id }}</td>
                            <td>{{ $personnel->nom }}</td>
                            <td>{{ $personnel->prenom }}</td>
                            <td>{{ $personnel->service }}</td>
                            <td>{{ $personnel->fonction }}</td>
                            <td>{{ $personnel->telephone }}</td>
                            <td>{{ $personnel->email }}</td>
                            <td class="text-center">
    <!-- Bouton Modifier -->
    <a href="{{ route('personnels.edit', $personnel->id) }}" class="btn btn-warning btn-sm" title="Modifier">
        <i class="fas fa-edit"></i>
    </a>

    <!-- Bouton Supprimer -->
    <form action="{{ route('personnels.destroy', $personnel->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce personnel ?')">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
