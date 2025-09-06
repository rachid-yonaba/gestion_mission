@extends('layouts.app')

@section('title', 'Page Personnels')

@section('content')
<h1>Types de missions</h1>
<a href="{{ route('type_de_missions.create') }}" class="btn btn-primary mb-3">Ajouter un type</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($types as $type)
        <tr>
            <td>{{ $type->id }}</td>
            <td>{{ $type->type }}</td>
            <td>
                <a href="{{ route('type_de_missions.edit', $type->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('type_de_missions.destroy', $type->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce type ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

