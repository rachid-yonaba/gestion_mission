<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'profil',
        'datenaissance',
        'nationalité',
        'expérience',
        'ville',
        'pays',
        'téléphone',
        'email',
        'CV',
        'RéférenceContrat',
        'ManifestationInt',
        'dateenregistrement'
    ];
}
