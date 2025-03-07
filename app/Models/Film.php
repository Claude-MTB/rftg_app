<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'film';

    protected $fillable = [
        'titre', 'date_sortie', 'description'
    ];

    protected $dates = ['date_sortie'];
}