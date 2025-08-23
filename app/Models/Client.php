<?php

// app/Models/Client.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'numclient',
        'nom_responsable',
        'fonction_responsable',
        'structure',
        'date_debut',
        'date_fin',
        'info_financiere',
        'reference_contrat',
        'manifestation_interet'
    ];

    protected $dates = ['date_debut', 'date_fin'];

    public function missions()
    {
        return $this->hasMany(Mission::class, 'Mission_NomClient', 'numclient');
    }
}
{
    //
}
