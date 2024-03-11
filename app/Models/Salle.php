<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $table = 'salles'; // Nom de la table si différent du nom par défaut


    protected $fillable = [
        'libelle',
        'adresse',
    ];

  
}
