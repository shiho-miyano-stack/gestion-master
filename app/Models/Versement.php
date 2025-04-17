<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\subvention;

class Versement extends Model
{
    use HasFactory;
    protected $table = 'versement';
    protected $primaryKey = 'Id';
    protected $fillable = [
        'DateVers',
        'Montant',
        'IdSubv',
        'periode_debut',
        'periode_fin',
        'mode_paiement',
        'reference_paiement',
        'observation'
    ];
    public function subvention()
    {
        return $this->belongsTo(Subvention::class, 'IdSubv','Id');

    
}public $timestamps = false;}
