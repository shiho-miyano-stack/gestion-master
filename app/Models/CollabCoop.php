<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollabCoop extends Model
{
   
    protected $table = 'collab_coop';
    public $timestamps = false;

    protected $fillable = [
        'id_coll',
        'id_coop',
    ];

    // Relations
    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class, 'id_coll');
    }

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class, 'id_coop');
    }
    use HasFactory;
}

    

