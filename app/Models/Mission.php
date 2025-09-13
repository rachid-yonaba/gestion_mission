<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $table = 'missions';

    protected $fillable = [
        'Description',
        'type',
        'chef',
        'budget',
        'datedebut',
        'datefin',
        'commentaire',
        'NomResponsable',
        'FontionResponsable',
        'NomClient',
        'NomConsultant',
        'Nbreemployé',
        'Adresse',
        'téléphone',
        'resultat',
        'Nbremois',
        'Libell',
    ];
}
