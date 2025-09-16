<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'libelle',
        'description',
        'chef_mission',
        'personnel_id',
        'client_id',
        'consultant_id',
        'typedemission_id',
        'budget',
        'datedebut',
        'datefin',
        'commentaire',
        'nbre_employe',
        'resultat',
        'nbre_mois',
    ];

    // Relations
    public function personnel() {
        return $this->belongsTo(Personnel::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function consultant() {
        return $this->belongsTo(Consultant::class);
    }

    public function typedemission() {
        return $this->belongsTo(Typedemission::class);
    }
}
