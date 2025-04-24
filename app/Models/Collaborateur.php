<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborateur extends Model
{   
    protected $table = 'collaborateur';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'NomFr',
        'NomAr',
        'CIN',
        'Telephonne',
        'Email',
        'Poste',
        'id_coop',
        'Date_naissance',
        'Sexe',
        'Situation_familiale',
        'Niveau_etude',
        'Couverture_sanitaire',
        'Num_affiliation',
        'Metier',
        'Competences',
    ];

    use HasFactory;
    public function cooperatives()
{
    return $this->belongsToMany(Cooperative::class, 'collab_coop', 'id_coll', 'id_coop');
}

}