<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolderSubv extends Model
{
    use HasFactory;
    protected $table = 'folder_subv';
    protected $primaryKey = 'Id';
    protected $fillable = [
        'Nom',
        'Size',
        'IdSubv',
        'Observation'
    ];
    public function subvention()
    {
            return $this->belongsTo(Subvention::class, 'IdSubv');}

    public $timestamps = false;
}
