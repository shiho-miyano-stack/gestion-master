<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\cooperative;
use App\Models\Subvention;

class DemandeSubvention extends Model
{    
    protected $table = 'demande_subvention';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = ['Satut', 'Observation', 'IdCoop', 'IdSubv' , 'fichier'];
    public function cooperative()
{
    return $this->belongsTo(Cooperative::class, 'IdCoop');
}

public function subvention()
{
    return $this->belongsTo(Subvention::class, 'IdSubv');
}
    use HasFactory;
}
