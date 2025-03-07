<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Film;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer tous les films depuis la base de données
        $films = Film::all(); 
    
        // Calculer le nombre total de films
        $totalFilms = $films->count();
    
        // Grouper les films par classification et compter
        $ratingStats = $films->groupBy('rating')->map->count();
    
        // Retourner la vue avec les données
        return view('dashboard', compact('films', 'totalFilms', 'ratingStats'));
    }
    
}
