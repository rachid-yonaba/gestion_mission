<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un type de mission</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h1>Ajouter un type de mission</h1>

<form action="{{ route('type_de_missions.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Type</label>
        <select name="type" class="form-control" required>
            <option value="">--Choisir--</option>
            <option value="Externe">Externe</option>
            <option value="Interne">Interne</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Enregistrer</button>
    <a href="{{ route('type_de_missions.index') }}" class="btn btn-secondary">Annuler</a>
</form>

</body>
</html>
