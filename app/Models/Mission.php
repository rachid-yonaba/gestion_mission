<?php
// app/Models/Mission.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = [
        'nummission',
        'code',
        'description',
        'type',
        'chef',
        'budget',
        'date_debut',
        'date_fin',
        'commentaire',
        'nom_responsable',
        'fonction_responsable',
        'nom_client',
        'nom_consultant',
        'nbre_employe',
        'adresse',
        'telephone',
        'resultat',
        'nbre_mois',
        'libelle'
    ];

    protected $dates = ['date_debut', 'date_fin'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'nom_client', 'numclient');
    }

    public function consultant()
    {
        return $this->belongsTo(Consultant::class, 'nom_consultant', 'numconsultant');
    }
}
{
    //
}