<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class FilmService
{
    public function getAllFilms()
    {
        $response = Http::get('http://localhost:8080/toad/film/all');
        
        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }

    public function getFilmById($id)
    {
        $response = Http::get("http://localhost:8080/toad/film/{$id}");
        
        if ($response->successful()) {
            return $response->json();
        }
        
        return null;
    }
}