<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FolderSubv extends Model
{
    protected $table = 'folder_subv';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Nom',
        'Size',
        'IdSubv',
        'Observation',
    ];

    // Relation avec Subvention
    public function subvention()
    {
        return $this->belongsTo(Subvention::class, 'IdSubv', 'Id');
    }
}
