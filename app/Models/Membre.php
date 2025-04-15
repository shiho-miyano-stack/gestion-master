<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $table = 'membre';
    protected $primaryKey = 'Id';
    protected $fillable = [
        'NomFr',
        'NomAr',
        'CNI',
        'Telephonne',
        'Email',
        'Poste'
    ];

    public $timestamps = false;
}
