@csrf
<div class="mb-3">
    <label>Code</label>
    <input type="text" name="code" class="form-control" value="{{ old('code',$mission->code ?? '') }}">
</div>
<div class="mb-3">
    <label>Libellé</label>
    <input type="text" name="libelle" class="form-control" value="{{ old('libelle',$mission->libelle ?? '') }}">
</div>
<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description',$mission->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Chef de Mission</label>
    <input type="text" name="chef_mission" class="form-control" value="{{ old('chef_mission',$mission->chef_mission ?? '') }}">
</div>
<div class="mb-3">
    <label>Personnel</label>
    <select name="personnel_id" class="form-control">
        @foreach($personnels as $p)
            <option value="{{ $p->id }}" {{ old('personnel_id',$mission->personnel_id ?? '')==$p->id?'selected':'' }}>
                {{ $p->nom }} {{ $p->prenom }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Client</label>
    <select name="client_id" class="form-control">
        @foreach($clients as $c)
            <option value="{{ $c->id }}" {{ old('client_id',$mission->client_id ?? '')==$c->id?'selected':'' }}>
                {{ $c->Structure }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Consultant</label>
    <select name="consultant_id" class="form-control">
        @foreach($consultants as $c)
            <option value="{{ $c->id }}" {{ old('consultant_id',$mission->consultant_id ?? '')==$c->id?'selected':'' }}>
                {{ $c->nom }} {{ $c->prenom }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Type de Mission</label>
    <select name="typedemission_id" class="form-control">
        @foreach($typedemissions as $t)
            <option value="{{ $t->id }}" {{ old('typedemission_id',$mission->typedemission_id ?? '')==$t->id?'selected':'' }}>
                {{ $t->type }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Budget</label>
    <input type="number" step="0.01" name="budget" class="form-control" value="{{ old('budget',$mission->budget ?? '') }}">
</div>
<div class="mb-3">
    <label>Date Début</label>
    <input type="date" name="datedebut" class="form-control" value="{{ old('datedebut',$mission->datedebut ?? '') }}">
</div>
<div class="mb-3">
    <label>Date Fin</label>
    <input type="date" name="datefin" class="form-control" value="{{ old('datefin',$mission->datefin ?? '') }}">
</div>
<div class="mb-3">
    <label>Commentaire</label>
    <textarea name="commentaire" class="form-control">{{ old('commentaire',$mission->commentaire ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Nombre Employés</label>
    <input type="number" name="nbre_employe" class="form-control" value="{{ old('nbre_employe',$mission->nbre_employe ?? '') }}">
</div>
<div class="mb-3">
    <label>Résultat</label>
    <input type="text" name="resultat" class="form-control" value="{{ old('resultat',$mission->resultat ?? '') }}">
</div>
<div class="mb-3">
    <label>Nombre Mois</label>
    <input type="number" name="nbre_mois" class="form-control" value="{{ old('nbre_mois',$mission->nbre_mois ?? '') }}">
</div>

<button type="submit" class="btn btn-primary">Enregistrer</button>
<a href="{{ route('missions.index') }}" class="btn btn-secondary">Annuler</a>
