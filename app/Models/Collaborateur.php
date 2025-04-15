<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborateur extends Model
{   
    protected $table = 'collaborateur';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = ['NomFr', 'NomAr', 'CIN', 'Telephonne', 'Email'];
    use HasFactory;
}
