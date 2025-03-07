<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Film;

class DashboardController extends Controller
{
    public function index()
    {
        $totalFilms = Film::count();
        $recentFilms = Film::orderBy('film_id', 'asc')->take(1000)->get();

        $genres = ['Action' => ['R', 'PG-13'], 'Comédie' => ['PG', 'G'], 'Drame' => ['R', 'PG-13']];
        $filmsByGenre = [];

        foreach ($genres as $genre => $ratings) {
            $filmsByGenre[$genre] = Film::whereIn('rating', $ratings)->get();
        }

        return view('dashboard', compact('totalFilms', 'recentFilms', 'filmsByGenre'));
    }
}
