<?php

// app/Models/Cooperative.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model
{
    use HasFactory;

    protected $table = 'cooperative';
    protected $primaryKey = 'Id';
    public $incrementing = true;
    protected $fillable = [
            'NumCop',
            'NomFr',
            'NomAr' ,
            'Province',
            'IdComm',
            'Siege',
            'Nature_siege',
            'NumEnre',
            'Date_Enre',
            'NumInscripFiscal',
            'DateCreation',
            'Telephonne',
            'Email',
            'Statut_coop',
            'Secteur',
            'Activites_coop',
            'But_coop',
            'Capital',
            'Chiffre_affaire','Equipements','Date_dernier_assemble',
            'Coord_X','Coord_Y','NbrMemMasc','NbrJeuneMemMasc','AgeJeuneMemMasc','AgeGrandMemMasc','NbrMemFem',
            'NbrJeuneMemFem','AgeJeuneMemFem', 'AgeGrandMemFem',
            'NbrMemSs','NbrMemRam','NbrCollMasc','AgeJeuneCollMasc',
            'AgeGrandCollMasc',
            'NbrCollFem','AgeJeuneCollFem','AgeGrandCollFem'];
    public $timestamps = false;

    // Relations
    public function commune()
    {
        return $this->belongsTo(Commune::class, 'IdComm');
    }

    public function secteur()
    {
        return $this->belongsTo(Secteur::class, 'Secteur');
    }

   
    // app/Models/Cooperative.php

public function membres()
{
    return $this->hasMany(Membre::class, 'id_coop');
}
public function collaborateurs()
{
    return $this->belongsToMany(Collaborateur::class, 'collab_coop', 'id_coop', 'id_coll');
}


}