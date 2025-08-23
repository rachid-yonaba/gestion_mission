<?php
// app/Models/Consultant.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    protected $fillable = [
        'numconsultant',
        'date_enregistrement',
        'nom',
        'prenom',
        'profil',
        'date_naissance',
        'nationalite',
        'experience',
        'ville',
        'pays',
        'telephone',
        'email',
        'cv',
        'reference_contrat',
        'manifestation_interet'
    ];

    protected $dates = ['date_enregistrement', 'date_naissance'];

    public function missions()
    {
        return $this->hasMany(Mission::class, 'Mission_NomConsultant', 'numconsultant');
    }
}
{
    //
}
