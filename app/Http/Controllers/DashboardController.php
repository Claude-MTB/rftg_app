<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Film;

class DashboardController extends Controller
{
    public function index()
    {
        // Nombre total de films
        $totalFilms = Film::count();

        // Films par classification (rating)
        $ratingStats = Film::selectRaw('rating, count(*) as count')
                           ->groupBy('rating')
                           ->get()
                           ->pluck('count', 'rating');

        // Films récents basés sur 'release_year' (année de sortie)
        $recentFilms = Film::orderBy('release_year', 'desc')->take(5)->get(); // Trier par année de sortie (descendant)

        // Films par genre fictif (exemple basé sur rating ici)
        $genres = ['Action' => ['R', 'PG-13'], 'Comédie' => ['PG', 'G'], 'Drame' => ['R', 'PG-13']];
        $filmsByGenre = [];

        foreach ($genres as $genre => $ratings) {
            $filmsByGenre[$genre] = Film::whereIn('rating', $ratings)->get();
        }

        return view('dashboard', compact('totalFilms', 'ratingStats', 'recentFilms', 'filmsByGenre'));
    }
}
