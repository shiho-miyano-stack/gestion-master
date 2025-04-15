<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Province;
class Commune extends Model
{   use HasFactory;
    protected $table = 'commune';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = ['Libelle', 'IdProv'];
    public function province()
    {
        return $this->belongsTo(Province::class, 'IdProv','Id');
    
}}
