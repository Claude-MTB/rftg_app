<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'film'; // Spécifiez explicitement le nom de la table

    protected $fillable = [
        'titre', 'date_sortie', 'description' // Ajoutez les champs à remplir
    ];

    protected $dates = ['date_sortie'];
}