<?php

// app/Models/Membre.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cooperative;
class Membre extends Model
{
    protected $table = 'membre';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'NomFr', 'NomAr', 'CNI', 'Telephonne', 'Email', 'Poste', 'id_coop'
    ];

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class, 'id_coop', 'Id');
    }
}
