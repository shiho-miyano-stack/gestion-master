<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subvention extends Model
{
    use HasFactory;
    protected $table = 'subvention';
    protected $primaryKey = 'Id';
    protected $fillable = [
        'Type_Sub',
        'Montant',
        'DateTransfert',
        'DateDepot'
    ];

    public $timestamps = false;
}
