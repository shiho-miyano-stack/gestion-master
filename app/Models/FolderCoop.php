<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cooperative;

class FolderCoop extends Model
{    
    protected $table = 'folder_coop';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = ['Nom', 'Size', 'IdCoop', 'Observation'];

    
    public function cooperative()
{
    return $this->belongsTo(Cooperative::class, 'IdCoop', 'Id');
}
    use HasFactory;
}
