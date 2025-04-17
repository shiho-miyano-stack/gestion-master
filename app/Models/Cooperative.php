<?php

// app/Models/Cooperative.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model
{
    use HasFactory;

    protected $table = 'cooperative';

    protected $fillable = [
        'NumCop', 'NomFr', 'NomAr', 'Num_Ordre', 'Date_Enre', 'Telephonne',
        'NumInscrip', 'DateCreation', 'NumAnalytique', 'NbrMem', 'NbrColl',
        'Secteur', 'Categorie', 'Adresse', 'Informations', 'IdComm',
        'DejaBeneficie', 'Nbr_Benifiement'
    ];
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

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'Categorie');
    }
}
