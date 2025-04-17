<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DemandeSubvention;

class DocumentJoint extends Model
{    protected $table = 'document_joint';
    public $timestamps = false;
    protected $fillable = [
        'demande_id',
        'nom_fichier',
        'type_fichier',
        'chemin_fichier',
        'date_ajout',
    ];

    public function demande()
    {
        return $this->belongsTo(DemandeSubvention::class, 'demande_id', 'Id');
    }
    use HasFactory;
}
