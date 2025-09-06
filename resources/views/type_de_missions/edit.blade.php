<!DOCTYPE html>
<html>
<head>
    <title>Modifier un type de mission</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h1>Modifier un type de mission</h1>

<form action="{{ route('type_de_missions.update', $type_de_mission->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Type</label>
        <select name="type" class="form-control" required>
            <option value="Externe" {{ $type_de_mission->type === 'Externe' ? 'selected' : '' }}>Externe</option>
            <option value="Interne" {{ $type_de_mission->type === 'Interne' ? 'selected' : '' }}>Interne</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Mettre à jour</button>
    <a href="{{ route('type_de_missions.index') }}" class="btn btn-secondary">Annuler</a>
</form>

</body>
</html>
